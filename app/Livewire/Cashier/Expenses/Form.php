<?php

namespace App\Livewire\Cashier\Expenses;

use App\Models\ExpenseCategory;
use Livewire\Component;

class Form extends Component
{

    public $id;
    public $isEdit = false;
    public $object;
    public $name;
    public $exclude_from_expenses;

    protected $rules = [
        'name'             => 'required|string|max:255',
    ];

    public function mount($expense=null)
    {
        if ($expense) {
            $expense = ExpenseCategory::findOrFail($expense);
       
            $this->id                    = $expense->id;
            $this->isEdit                = true;
            $this->object                = $expense;
            $this->name                  = $expense->name;
            $this->exclude_from_expenses = $expense->exclude_from_expenses;
        }
    }

    public function render()
    {
        return view('livewire.cashier.expenses.form');
    }

    public function save()
    {
        $this->validate();

        $fields = [
            'name'                    => $this->name,
            'exclude_from_expenses'   => $this->exclude_from_expenses,
        ];

        if ($this->isEdit) {
            $expense = ExpenseCategory::findOrFail($this->id);
            $expense->fill($fields);
            $expense->save();
        }else{
            $expense = ExpenseCategory::create($fields);
        }

        $this->id = $expense->id;
        if (!$this->isEdit) {
            $this->reset();
        }

        session()->flash('success', $this->isEdit ? __('Updated') : __('Saved'));

        return redirect()->route('expenses.categories.edit', ['expense' => $expense->id]);

    }
}
