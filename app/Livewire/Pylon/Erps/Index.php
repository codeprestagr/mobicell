<?php

namespace App\Livewire\Pylon\Erps;

use App\Models\Erp;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Index extends Component
{


    use WithPagination, WithoutUrlPagination;
    public $search;
    public $filterWithoutShippings = false;  // Χειριστής για το φίλτρο χωρίς shipping

    protected $updatesQueryString = ['search'];
    public function updatedSearch()
    {
        $this->resetPage(); // Επαναφέρει το pagination στην πρώτη σελίδα κάθε φορά που αλλάζει η αναζήτηση
    }
    public function render()
    {

        $query = Erp::where('name', 'LIKE', '%' . $this->search . '%')->latest();

        if ($this->filterWithoutShippings) {
            $query->doesntHave('shippings');
        }

        $erps = $query->paginate(5);

        return view('livewire.pylon.erps.index',[
            'items' => $erps,
            'count' => Erp::all()->count(),
            'hasMainErp' => Erp::where('is_main', true)->first()
        ]);
    }
}
