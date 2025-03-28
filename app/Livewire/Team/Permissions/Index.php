<?php

namespace App\Livewire\Team\Permissions;

use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class Index extends Component
{

    use WithPagination, WithoutUrlPagination;
    public $search;


    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $permissions = Permission::where('name', 'LIKE', '%' . $this->search . '%')->latest()->paginate();
        return view('livewire.team.permissions.index',[
            'items' => $permissions,
            'count' => Permission::all()->count(),
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
        $permission = Permission::findOrFail($id['id']);
        $permission->delete();

        LivewireAlert::title(__('Deleted'))
            ->text(__('The deletion was successful!'))
            ->success()
            ->timer(2000)
            ->show();
    }

    public function clearSearch()
    {
        $this->search = '';
    }
}
