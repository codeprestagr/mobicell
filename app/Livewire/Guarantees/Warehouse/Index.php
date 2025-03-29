<?php

namespace App\Livewire\Guarantees\Warehouse;

use App\Models\Customer;
use App\Models\Warehouse;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Index extends Component
{

    protected $updatesQueryString = ['search'];
    public $search;
    use WithPagination, WithoutUrlPagination;

    public function updatedSearch()
    {
        $this->resetPage(); // Επαναφέρει το pagination στην πρώτη σελίδα κάθε φορά που αλλάζει η αναζήτηση
    }
    public function render()
    {
        $user = auth()->user();

        $warehouses = Warehouse::query()
            ->when($user->store_id, function ($query) use ($user) { // Αν ο χρήστης έχει store_id, φιλτράρουμε
                $query->where('warehouses.store_id', $user->store_id);
            })
            ->where(function ($query) {
                $query->where('warehouses.name', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('warehouses.tax', 'LIKE', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(10);


        $count = Warehouse::query()
            ->when($user->store_id, function ($query) use ($user) { // Αν ο χρήστης έχει store_id, φιλτράρουμε
                $query->where('warehouses.store_id', $user->store_id);
            })->count();

        return view('livewire.guarantees.warehouse.index',[
            'items' => $warehouses,
            'count' => $count,
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
        $warehouse= Warehouse::findOrFail($id['id']);
        $warehouse->delete();

        LivewireAlert::title(__('Deleted'))
            ->text(__('The deletion was successful!'))
            ->success()
            ->timer(2000) // Dismisses after 3 seconds
            ->show();
    }
}
