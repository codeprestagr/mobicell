<?php

namespace App\Livewire\Guarantees\Warehouse;

use Livewire\Component;

class Form extends Component
{
    public $id;
    public $isEdit = false;
    public $object;


    protected $rules = [
        'name'                  => 'required|string|max:255',
        'quantity'                  => 'required|integer',
        'price'                 => 'required|decimal',
        'profit'                => 'required',
        'store_id'              => 'required|integer',
    ];

    public function render()
    {
        return view('livewire.guarantees.warehouse.form');
    }
}
