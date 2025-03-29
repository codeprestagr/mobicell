<?php

namespace App\Livewire\Data\Catalog;

use App\Jobs\SyncProductsBatchDispatcherJob;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class ProductList extends Component
{

    use WithPagination, WithoutUrlPagination;
    public $page = 1;
    public $limit = 1000;
    public $totalProducts;
    public bool $loading = false;
    public bool $success = false;
    public bool $disabled = false; // ✅ Για να ελέγχουμε αν το κουμπί είναι ανενεργό
    public $search;
    protected $updatesQueryString = ['search'];
    protected $listeners = [
        'echo:sync-channel,queue-finished' => 'jobCompleted', // ✅ Όταν ολοκληρωθεί το batch, ενεργοποιείται η μέθοδος jobCompleted
    ];
    public function updatedSearch()
    {
        $this->resetPage(); // Επαναφέρει το pagination στην πρώτη σελίδα κάθε φορά που αλλάζει η αναζήτηση
    }

    public function handleQueueFinished()
    {
        // Ενημερώστε την κατάσταση του component ή εκτελέστε άλλες ενέργειες
    }
    public function mount()
    {
        $this->getTotalProducts();
    }

    public function render()
    {

        $products = Product::where(function($query) {
            $query->where('sku', 'LIKE', '%' . $this->search . '%')

                ->orWhere('name', 'LIKE', '%' . $this->search . '%')
                ->orWhere('price', 'LIKE', '%' . $this->search . '%');
        })
            ->latest()
            ->paginate(10);

        return view('livewire.data.catalog.product-list',[
            'items' => $products,
            'count' => Product::all()->count(),
            ]);
    }

    public function getTotalProducts()
    {
        // Fetch total number of products
        $response = Http::get('https://gizmos.gr/laravel-api');
        $this->totalProducts = $response->json()['pagination']['total_products'];
    }

    public function sync()
    {

        $this->loading = true;
        $this->success = false;
        $this->disabled = true; // Απενεργοποιούμε το κουμπί

        SyncProductsBatchDispatcherJob::dispatch($this->page, $this->limit, $this->totalProducts);
        $this->dispatch('sync-started'); // Event για ενημέρωση UI

    }

    public function jobCompleted()
    {
        $this->loading = false;
        $this->success = true;
        $this->disabled = false; // Ενεργοποίηση ξανά του κουμπιού


    }


}
