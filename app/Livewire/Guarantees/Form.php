<?php

namespace App\Livewire\Guarantees;

use App\Models\Customer;
use App\Models\Product;
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
    public $addingProduct = true; // Ελέγχει αν εμφανίζεται η φόρμα αναζήτησης προϊόντος

    public $search = ''; // Για αναζήτηση προϊόντων
    public $products = []; // Λίστα με τα προϊόντα που ταιριάζουν
    public $selectedProducts = []; // Πίνακας με επιλεγμένα προϊόντα
    public $selectedProductId = null;

    public $unitPrice = '';
    public $imei = '';

    protected $rules = [
        'firstname'             => 'required|string|max:255',
        'lastname'              => 'required|string|max:255',
        'email'                 => 'required',
        'address'               => 'required|string|max:255',
        'phone'                 => 'required|string|max:10|min:10',
        'postcode'              => 'required|string|max:255',
        'city'                  => 'required|string|max:255',
    ];
    public function mount()
    {
        $this->selectedProductId = null;
    }
    public function showProductForm()
    {
        $this->addingProduct = true;
    }

public  function updatedSearch()
{
    $this->products = Product::where('name', 'like', '%' . $this->search . '%')->get();
}

    public function updatedSelectedProductId()
    {
        $this->selectedProductId = intval($this->selectedProductId);

        if ($this->selectedProductId) {
            $product = Product::find($this->selectedProductId);

            $this->unitPrice = $product->price;

        }
    }

    public function addProductToList()
    {
        // Βρες το προϊόν από τη λίστα
        $product = collect($this->products)->firstWhere('id', $this->selectedProductId);

        // Αν δεν υπάρχει προϊόν, σταμάτα
        if (!$product) {
            return;
        }

        // Πρόσθεσε το προϊόν στη λίστα
        $this->selectedProducts[] = [
            'id'    => $product['id'],
            'name'  => $product['name'],
            'imei'  => $this->imei,
            'price' => $product['price'],
        ];

        // Καθαρισμός των input fields
        $this->selectedProductId = null;

        $this->imei = null;
        $this->unitPrice = null;
        $this->search = null; // Καθαρισμός της αναζήτησης





    }

    public function removeProduct($index)
    {
        unset($this->selectedProducts[$index]);
        $this->selectedProducts = array_values($this->selectedProducts);
    }

    public function save()
    {
        dd($this->selectedProducts);

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
