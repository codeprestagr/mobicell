<?php

namespace App\Livewire\Stores;


use App\Livewire\BaseComponent;
use App\Models\Store;
use Livewire\Component;

class Form extends Component
{

    public $name;
    public $email;
    public $gemi_number;
    public $id;
    public $isEdit = false;
    public $vat_number;
    public $doi;
    public $address;
    public $company;
    public $business_activity;
    public $phone;
    public $city;
    public $website;
    public $postcode;
    public $object;
    protected $rules = [
        'name'                  => 'required|string|max:255',
        'email'                 => 'required|string|lowercase|email|max:255|unique:'.Store::class,
        'gemi_number'           => 'required|string|max:255',
        'vat_number'            => 'required|string|max:255',
        'doi'                   => 'required|string|max:255',
        'address'               => 'required|string|max:255',
        'company'               => 'required|string|max:255',
        'business_activity'     => 'required|string|max:255',
        'phone'                 => 'required|string|max:10|min:10',
        'website'               => 'nullable|url',
        'postcode'              => 'required|string|max:255',
        'city'                  => 'required|string|max:255',
    ];

    public function render()
    {
        return view('livewire.stores.form');
    }

    public function mount($store = null)
    {
        if ($store) {
            $store                   = Store::findOrFail($store);
            $this->object            = $store;
            $this->name              = $store->name;
            $this->email             = $store->email;
            $this->gemi_number       = $store->gemi_number;
            $this->vat_number        = $store->vat_number;
            $this->doi               = $store->doi;
            $this->address           = $store->address;
            $this->company           = $store->company;
            $this->business_activity = $store->business_activity;
            $this->phone             = $store->phone;
            $this->city              = $store->city;
            $this->website           = $store->website;
            $this->postcode          = $store->postcode;
            $this->isEdit            = true;
            $this->id                = $store->id;
        }
    }


    public function save()
    {
        if ($this->isEdit) {
            $this->rules['email'] = 'required|string|lowercase|email|max:255|unique:stores,email,' . $this->id;
        } else {
            $this->rules['email'] = 'required|string|lowercase|email|max:255|unique:stores,email';
        }

        $this->validate();

        $fields = [
            'name'              => $this->name,
            'email'             => $this->email,
            'gemi_number'       => $this->gemi_number,
            'vat_number'        => $this->vat_number,
            'doi'               => $this->doi,
            'address'           => $this->address,
            'company'           => $this->company,
            'business_activity' => $this->business_activity,
            'phone'             => $this->phone,
            'city'              => $this->city,
            'website'           => $this->website,
            'postcode'          => $this->postcode,

        ];


        if ($this->isEdit) {
            $store = Store::findOrFail($this->id);
            $store->fill($fields);
            $store->save();
        } else {
            $store = Store::create($fields);
        }
        $this->id = $store->id;
        if (!$this->isEdit) {
            $this->reset();
        }
        session()->flash('success', $this->isEdit ? __('Updated') : __('Saved'));
        return redirect()->route('stores.edit', ['store' => $store->id]);
    }
}
