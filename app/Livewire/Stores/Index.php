<?php

namespace App\Livewire\Stores;

use App\Livewire\BaseComponent;
use App\Models\Store;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Index extends BaseComponent
{
    protected $updatesQueryString = ['search'];
    use WithPagination, WithoutUrlPagination;

    protected array $permissions = [
        'render' => 'stores.index',
        'save'   => 'stores.create',
        'delete' => 'stores.delete',
    ];


    public $search;
    public function updatedSearch()
    {
        $this->resetPage(); // Επαναφέρει το pagination στην πρώτη σελίδα κάθε φορά που αλλάζει η αναζήτηση
    }
    public function render()
    {

        $stores = Store::where(function($query) {
            $query->where('name', 'LIKE', '%' . $this->search . '%')
                ->orWhere('email', 'LIKE', '%' . $this->search . '%')
                ->orWhere('gemi_number', 'LIKE', '%' . $this->search . '%')
                ->orWhere('vat_number', 'LIKE', '%' . $this->search . '%')
                ->orWhere('doi', 'LIKE', '%' . $this->search . '%')
                ->orWhere('address', 'LIKE', '%' . $this->search . '%')
                ->orWhere('company', 'LIKE', '%' . $this->search . '%')
                ->orWhere('business_activity', 'LIKE', '%' . $this->search . '%')
                ->orWhere('phone', 'LIKE', '%' . $this->search . '%')
                ->orWhere('city', 'LIKE', '%' . $this->search . '%')
                ->orWhere('website', 'LIKE', '%' . $this->search . '%')
                ->orWhere('postcode', 'LIKE', '%' . $this->search . '%');
        })
            ->latest()
            ->paginate(10);

        return view('livewire.stores.index',[
            'stores' => $stores,
            'count' => Store::all()->count(),
        ]);
    }

    public function delete($id){

        if (!$this->hasPermission('delete')) {
            abort(403, __('You do not have permission for this action.'));
        }

        LivewireAlert::title(__('Are you sure you want to delete this store?'))
            ->withConfirmButton(__('Yes, delete it!'))
            ->withCancelButton(__('No, Cancel'))
            ->onConfirm('deleteData', ['id' => $id])
            ->show();
    }

    public function deleteData($id)
    {
        $store= Store::findOrFail($id['id']);
        $store->delete();

        LivewireAlert::title(__('User Deleted!'))
            ->text(__('Store has successfully deleted!'))
            ->success()
            ->timer(2000) // Dismisses after 3 seconds
            ->show();
    }
}
