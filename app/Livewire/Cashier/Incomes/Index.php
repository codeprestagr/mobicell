<?php

namespace App\Livewire\Cashier\Incomes;

use App\Models\IncomeCategory;
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
        $incomes = IncomeCategory::where('name', 'LIKE', '%' . $this->search . '%')->latest()
            ->paginate(10);
        return view('livewire.cashier.incomes.index',[
            'items' => $incomes,
            'count' => IncomeCategory::all()->count(),
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
        $IncomeCategory = IncomeCategory::findOrFail($id['id']);
        $IncomeCategory->delete();
        LivewireAlert::title(__('Deleted'))
            ->text(__('The deletion was successful!'))
            ->success()
            ->timer(2000)
            ->show();
    }

}
