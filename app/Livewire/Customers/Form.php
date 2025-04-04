<?php

namespace App\Livewire\Customers;

use App\Models\Customer;
use App\Models\Store;
use Livewire\Component;

class Form extends Component
{


    public $firstname;
    public $lastname;
    public $user_id;
    public $email;
    public $phone;
    public $address;
    public $city;
    public $postcode;
    public $isEdit = false;
    public $id;

    public $object;
    public $stores;
    public $store_id;

    protected $rules = [
        'firstname'             => 'required|string|max:255',
        'lastname'              => 'required|string|max:255',
        'email'                 => 'required|string|lowercase|email|max:255|unique:'.Customer::class,
        'address'               => 'required|string|max:255',
        'phone'                 => 'required|string|max:10|min:10',
        'postcode'              => 'required|string|max:255',
        'city'                  => 'required|string|max:255',
    ];


    public function render()
    {
        return view('livewire.customers.form');
    }


    public function mount($customer = null)
    {
        $this->stores = Store::all();
        if ($customer) {
            $customer                = Customer::findOrFail($customer);
            $this->object            = $customer;
            $this->firstname         = $customer->firstname;
            $this->lastname          = $customer->lastname;
            $this->email             = $customer->email;
            $this->phone             = $customer->phone;
            $this->address           = $customer->address;
            $this->city              = $customer->city;
            $this->postcode          = $customer->postcode;
            $this->isEdit            = true;
            $this->store_id          = $customer->store_id;
            $this->id                = $customer->id;
            $this->user_id           = $customer->user_id;
        }
    }


    public function save()
    {
        if ($this->isEdit) {
            $this->rules['email'] = 'required|string|lowercase|email|max:255|unique:customers,email,' . $this->id;
        } else {
            $this->rules['email'] = 'required|string|lowercase|email|max:255|unique:customers,email';
        }

        $this->validate();

        $fields = [
           'firstname'      => $this->firstname,
            'lastname'      => $this->lastname,
            'email'         => $this->email,
            'phone'         => $this->phone,
            'address'       => $this->address,
            'city'          => $this->city,
            'postcode'      => $this->postcode,
            'store_id'      => ($this->store_id) ? $this->store_id : null,
            'user_id'       => (!$this->isEdit) ? auth()->user()->id : $this->user_id,
        ];


        if ($this->isEdit) {
            $customer = Customer::findOrFail($this->id);
            $customer->fill($fields);
            $customer->save();
        } else {
            $customer = Customer::create($fields);
        }

        $this->id = $customer->id;
        if (!$this->isEdit) {
            $this->reset();
        }
        session()->flash('success', $this->isEdit ? __('Updated') : __('Saved'));
        return redirect()->route('customers.edit', ['customer' => $customer->id]);
    }
}
