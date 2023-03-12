<?php

namespace App\Listeners;

use App\Events\InstallCreated;
use Illuminate\Contracts\Queue\ShouldQueue;

class InstallCreatedListener implements ShouldQueue
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
    public function handle(InstallCreated $event): void
    {
        //
    }
}
