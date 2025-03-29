<?php

namespace App\Listeners;

use App\Events\SyncComplete;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Livewire\Livewire;

class SyncCompleteListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SyncComplete $event): void
    {
        Livewire::dispatch('sync-complete', ['message' => $event->message]);



    }
}
