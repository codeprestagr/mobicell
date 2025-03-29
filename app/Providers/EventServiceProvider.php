<?php

namespace App\Providers;

use App\Events\SyncComplete;
use App\Listeners\SyncCompleteListener;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        SyncComplete::class => [
            SyncCompleteListener::class, // Register the listener for the SyncComplete event
        ],
    ];

}
