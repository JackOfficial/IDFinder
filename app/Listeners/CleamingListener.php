<?php

namespace App\Listeners;

use App\Events\CleamingEvent;
use App\Notifications\CleamingNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CleamingListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\CleamingEvent  $event
     * @return void
     */
    public function handle(CleamingEvent $event)
    {
        $user = $event->user;
        $user->notify(new CleamingNotification($user->name));
    }
}
