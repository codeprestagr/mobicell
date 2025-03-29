<?php

namespace App\Livewire\Customers;

use App\Models\Customer;
use App\Models\Store;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Index extends Component
{


    protected $updatesQueryString = ['search'];
    use WithPagination, WithoutUrlPagination;

    public $search;
    public $storeFilter;
    public function updatedSearch()
    {
        $this->resetPage(); // Επαναφέρει το pagination στην πρώτη σελίδα κάθε φορά που αλλάζει η αναζήτηση
    }


    public function render()
    {
        $user = auth()->user();
        $customers = $user->filterByStore(Customer::query()) // Apply store filter
        ->where(function ($query) {
            $query->where('firstname', 'LIKE', '%' . $this->search . '%')
                ->orWhere('lastname', 'LIKE', '%' . $this->search . '%')
                ->orWhere('email', 'LIKE', '%' . $this->search . '%')
                ->orWhere('address', 'LIKE', '%' . $this->search . '%')
                ->orWhere('phone', 'LIKE', '%' . $this->search . '%')
                ->orWhere('city', 'LIKE', '%' . $this->search . '%')
                ->orWhere('postcode', 'LIKE', '%' . $this->search . '%');
        })
            ->latest()
            ->paginate(10);
        return view('livewire.customers.index',[
            'items' => $customers,
            'stores' => Store::all(),
            'count' => $user->filterByStore(Customer::query())->count()
        ]);
    }

    public function delete($id){

        LivewireAlert::title(__('Are you sure?'))
            ->withConfirmButton(__('Yes, delete it!'))
            ->withCancelButton(__('No, Cancel'))
            ->onConfirm('deleteData', ['id' => $id])
            ->show();
    }

    public function deleteData($id)
    {
        $customer= Customer::findOrFail($id['id']);
        $customer->delete();

        LivewireAlert::title(__('Deleted'))
            ->text(__('The deletion was successful!'))
            ->success()
            ->timer(2000) // Dismisses after 3 seconds
            ->show();
    }
}
