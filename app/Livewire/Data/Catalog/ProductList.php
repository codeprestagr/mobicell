<?php

namespace App\Livewire\Data\Catalog;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class ProductList extends Component
{
    protected $updatesQueryString = ['search'];
    use WithPagination, WithoutUrlPagination;


    public $search;

    public function updatedSearch()
    {
        $this->resetPage(); // Επαναφέρει το pagination στην πρώτη σελίδα κάθε φορά που αλλάζει η αναζήτηση
    }

    public function render()
    {

        $products = Product::where(function($query) {
            $query->where('sku', 'LIKE', '%' . $this->search . '%')

                ->orWhere('name', 'LIKE', '%' . $this->search . '%')
                ->orWhere('price', 'LIKE', '%' . $this->search . '%');
        })
            ->latest()
            ->paginate(10);

        return view('livewire.data.catalog.product-list',[
            'items' => $products,
            'count' => Product::all()->count(),
            ]);
    }
}
