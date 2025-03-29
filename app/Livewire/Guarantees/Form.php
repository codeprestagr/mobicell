<?php

namespace App\Livewire\Guarantees;

use App\Models\Customer;
use Livewire\Component;

class Form extends Component
{
    public $isEdit = false;
    public $id;
    public $object;
    public $store_id;
    public $lastname;
    public $firstname;
    public $email;
    public $address;
    public $phone;
    public $city;
    public $postcode;
    public $user_id;
    public $new_order = false;
    protected $rules = [
        'firstname'             => 'required|string|max:255',
        'lastname'              => 'required|string|max:255',
        'email'                 => 'required',
        'address'               => 'required|string|max:255',
        'phone'                 => 'required|string|max:10|min:10',
        'postcode'              => 'required|string|max:255',
        'city'                  => 'required|string|max:255',
    ];

    public function save()
    {
        $this->validate();
        $customerData = [
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'address' => $this->address,
            'phone' => $this->phone,
            'city' => $this->city,
            'postcode' => $this->postcode,
            'user_id' => auth()->user()->id,
        ];

        // Use updateOrCreate to update the customer if email exists or create a new one
        $customer = Customer::updateOrCreate(
            ['email' => $this->email],  // Search for customer by email
            $customerData  // Data to either update or create a new customer
        );

        dd($customer->id);
    }


    public function render()
    {
        return view('livewire.guarantees.form');
    }

    public function toggleOrder()
    {
        $this->new_order = !$this->new_order;
    }


}
