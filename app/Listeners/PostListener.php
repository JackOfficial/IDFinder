<?php

namespace App\Listeners;

use App\Events\PostEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;
use App\Notifications\NewPostNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class PostListener
{
    use Notifiable;
    
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
     * @param  \App\Events\PostEvent  $event
     * @return void
     */
    public function handle(PostEvent $event)
    {
        $user = User::findOrFail(Auth::id());
        $user->notify(new NewPostNotification());
    }
}
