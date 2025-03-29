<?php

namespace App\Livewire;

use App\Jobs\SyncProductsJob;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Sync extends Component
{
    public $page = 1;
    public $limit = 400;
    public $totalProducts;
    public $syncedProducts = 0;
    public $isSyncing = false;
    public $message='';
    public $progress = 0;

    protected $listeners = ['sync-complete' => 'syncComplete', 'sync-progress' => 'syncProgressUpdated'];





    public function syncComplete($message)
    {
        $this->message = $message;
        session()->flash('message', $message);
        $this->dispatch('sync-complete', ['message' => $message]);
    }
    public function mount()
    {
        $this->getTotalProducts();
    }

    public function getTotalProducts()
    {
        // Fetch total number of products
        $response = Http::get('https://gizmos.gr/laravel-api');
        $this->totalProducts = $response->json()['pagination']['total_products'];
    }

    public function syncProducts()
    {
        $this->isSyncing = true;
        $this->syncedProducts = 0;
        $this->progress = 0;

        // Dispatch the sync job to the queue
        SyncProductsJob::dispatch($this->page, $this->limit, $this->totalProducts);

        // Notify the frontend that the sync has started
        $this->dispatch('sync-start');
    }

    public function syncProgressUpdated($progress, $syncedProducts, $totalProducts)
    {
        $this->progress = $progress;
        $this->syncedProducts = $syncedProducts;
        $this->totalProducts = $totalProducts;
    }
    public function render()
    {
        return view('livewire.sync');
    }
}
