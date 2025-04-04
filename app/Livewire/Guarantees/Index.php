<?php

namespace App\Livewire\Guarantees;

use App\Models\Guarantee;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Index extends Component
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

        $Guarantees = Guarantee::where(function($query) {
            $query->where('reference', 'LIKE', '%' . $this->search . '%')

                ->orWhere('notes', 'LIKE', '%' . $this->search . '%')
                ->orWhere('total_amount', 'LIKE', '%' . $this->search . '%')
                ->orWhere('cashier_code', 'LIKE', '%' . $this->search . '%');
        })
            ->latest()
            ->paginate(10);

        return view('livewire.guarantees.index',[
            'items' => $Guarantees,
            'count' => Guarantee::all()->count(),
        ]);
    }
}
