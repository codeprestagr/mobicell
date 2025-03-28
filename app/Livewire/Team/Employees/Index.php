<?php

namespace App\Livewire\Team\Employees;

use App\Models\Store;
use App\Models\User;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination, WithoutUrlPagination;
    public $search;
    public $storeFilter = null; // Property for store filter
    protected $updatesQueryString = ['search', 'storeFilter'];


    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedStoreFilter()
    {
        $this->resetPage(); // Reset pagination when filter changes
    }

    public function render()
    {
        $isSuperAdmin = auth()->user()->hasRole('super-admin');
        $stores = Store::all();
        $items = User::where(function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%');
        })->when($this->storeFilter, function ($query) {
            $query->where('store_id', $this->storeFilter); // Filter by store
        })->latest()->paginate(5);
        return view('livewire.team.employees.index',[
            'items' => $items,
            'count' => User::all()->count(),
            'isSuperAdmin' => $isSuperAdmin,
            'stores' => $stores, // Pass stores to the view
        ]);
    }

    public function delete($id){
        LivewireAlert::title(__('Are you sure?'))
            ->withConfirmButton(__('Yes, delete it!'))
            ->withCancelButton(__('No, Cancel'))
            ->onConfirm('deleteData', ['id' => $id])
            ->show();
    }

    public function clearSearch()
    {
        $this->search = '';
        $this->storeFilter = null;
    }
    public function deleteData($id)
    {
        $user = User::findOrFail($id['id']);

        if ($user->hasRole('super-admin') && User::role('super-admin')->count() === 1) {
            session()->flash('error', __('You cannot delete the last super-admin.'));
            return;
        }
        if (auth()->id() == $user->id) {
            session()->flash('error', __('You cannot delete your own account.'));
            return;
        }
        $user->delete();

        LivewireAlert::title(__('Deleted'))
            ->text(__('The deletion was successful!'))
            ->success()
            ->timer(2000) // Dismisses after 3 seconds
            ->show();
    }

}
