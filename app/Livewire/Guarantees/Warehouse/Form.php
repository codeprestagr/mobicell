<?php

namespace App\Livewire\Guarantees\Warehouse;

use App\Models\Warehouse;
use Livewire\Component;

class Form extends Component
{
    public $id;
    public $isEdit = false;
    public $object;

    public $name;
    public $price;
    public $profit;
    public $store_id;
    public $quantity;
    public $disable=false;


    protected $rules = [
        'name'                  => 'required|string|max:255',
        'quantity'                  => 'required|integer',
        'price'   => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/', // Validate as a number with up to 2 decimal places
        'profit'                => 'required',
    ];

    public function mount($warehouse=null)
    {
        if ($warehouse) {
            $warehouse              = Warehouse::findOrFail($warehouse);

                if ($warehouse->from_erp) {
                    if ($warehouse->sync)
                    {
                        return redirect()->route('guarantees.warehouse.index');
                    }

                    $this->disable  = true;
                }
            //70785
                $this->name         = $warehouse->name;
                $this->price        = $warehouse->price;
                $this->profit       = $warehouse->profit;
                $this->quantity     = $warehouse->quantity;
                $this->isEdit       = true;
                $this->store_id     = $warehouse->store_id;
                $this->id           = $warehouse->id;
        }
    }
    public function render()
    {
        return view('livewire.guarantees.warehouse.form');
    }

    public function save()
    {
        $this->validate();
        $user = auth()->user();

        $fields = [
            'name' => $this->name,
            'price' => $this->price,
            'profit' => $this->profit,
            'store_id' => $user->store_id ?? null,
            'quantity' => $this->quantity,
            'tax' => true
        ];

        if ($this->isEdit) {
            $warehouse = Warehouse::findOrFail($this->id);
            $warehouse->fill($fields);
            $warehouse->save();
        } else {
            $warehouse = Warehouse::create($fields);
        }
        $this->id = $warehouse->id;
        if (!$this->isEdit) {
            $this->reset();
        }


        session()->flash('success', $this->isEdit ? __('Updated') : __('Saved'));
        return redirect()->route('guarantees.warehouse.edit', ['warehouse' => $warehouse->id]);
    }
}
