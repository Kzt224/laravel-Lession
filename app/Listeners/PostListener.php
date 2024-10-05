<?php

namespace App\Listeners;

use App\Mail\PostCreated;
use App\Events\PostCreatedEvent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        
    }

    /**
     * Handle the event.
     */
    public function handle(PostCreatedEvent $event): void
    {
        Mail::to('poe@gmail.com')->send(new PostCreated($event->post));

    }
}
