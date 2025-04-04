<?php

namespace App\Livewire\Cashier;

use App\Models\CashRegister;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;

class Index extends Component
{

    public $currentFormat;

    public $cashRegister;
    public $initialBalance;
    public $id=false;


    protected $rules = [
        'initialBalance' => 'required|numeric|min:0',

    ];



    public function mount()
    {

        // Βρίσκουμε την εγγραφή που αντιστοιχεί στην σημερινή ημερομηνία
        $this->cashRegister = CashRegister::whereDate('created_at', Carbon::today())->first();
        // Αν δεν υπάρχει εγγραφή για την σημερινή ημερομηνία, την δημιουργούμε
        if ($this->cashRegister) {
                $this->id = $this->cashRegister->id;
        }

    }

    public function render()
    {
        $currentDate = Carbon::now();
        $this->currentFormat = $currentDate->format('l, d F Y');
        return view('livewire.cashier.index',[
            'currentDate' => $this->currentFormat,
            'id' => $this->id,

        ]);
    }



    public function save()
    {
        $this->validate();
        $this->cashRegister = new CashRegister([
            'created_at' => Carbon::today(),
            'initial_balance' => $this->initialBalance,
        ]);
        $this->cashRegister->save();
        $this->id = $this->cashRegister->id;
    }

}
