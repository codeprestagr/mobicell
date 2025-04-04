<?php

namespace App\Livewire\Cashier\Incomes;

use App\Models\IncomeCategory;
use Livewire\Component;

class Form extends Component
{

    public $id;
    public $isEdit = false;
    public $object;
    public $name;


    protected $rules = [
        'name'             => 'required|string|max:255',
    ];

    public function render()
    {
        return view('livewire.cashier.incomes.form');
    }

    public function mount($income=null)
    {
        if ($income) {
            $IncomeCategory = IncomeCategory::findOrFail($income);

            $this->id                    = $IncomeCategory->id;
            $this->isEdit                = true;
            $this->object                = $income;
            $this->name                  = $IncomeCategory->name;

        }
    }



    public function save()
    {
        $this->validate();

        $fields = [
            'name'                    => $this->name,
        ];

        if ($this->isEdit) {
            $IncomeCategory = IncomeCategory::findOrFail($this->id);
            $IncomeCategory->fill($fields);
            $IncomeCategory->save();
        }else{
            $IncomeCategory = IncomeCategory::create($fields);
        }

        $this->id = $IncomeCategory->id;
        if (!$this->isEdit) {
            $this->reset();
        }

        session()->flash('success', $this->isEdit ? __('Updated') : __('Saved'));
        return redirect()->route('incomes.categories.edit', ['income' => $IncomeCategory->id]);
    }
}
