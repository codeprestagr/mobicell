<?php

namespace App\Livewire\Cashier\Expenses;

use App\Models\ExpenseCategory;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Index extends Component
{

    public $search;
    protected $updatesQueryString = ['search'];
    use WithPagination, WithoutUrlPagination;

    public function updatedSearch()
    {
        $this->resetPage(); // Επαναφέρει το pagination στην πρώτη σελίδα κάθε φορά που αλλάζει η αναζήτηση
    }



    public function render()
    {
        $expenses = ExpenseCategory::where('name', 'LIKE', '%' . $this->search . '%')->latest()
            ->paginate(10);
        return view('livewire.cashier.expenses.index',[
            'items' => $expenses,
            'count' => ExpenseCategory::all()->count(),
        ]);
    }


    /***
     * @param $id
     * @return void
     */
    public function delete($id){

        LivewireAlert::title(__('Are you sure?'))
            ->withConfirmButton(__('Yes, delete it!'))
            ->withCancelButton(__('No, Cancel'))
            ->onConfirm('deleteData', ['id' => $id])
            ->show();
    }


    /********
     * @param $id
     * @return void
     */
    public function deleteData($id)
    {
        $ExpenseCategory = ExpenseCategory::findOrFail($id['id']);
        $ExpenseCategory->delete();
        LivewireAlert::title(__('Deleted'))
            ->text(__('The deletion was successful!'))
            ->success()
            ->timer(2000)
            ->show();
    }


}
