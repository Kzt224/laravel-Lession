<?php

namespace App\Providers;

use App\Listeners\PostListener;
use App\Events\PostCreatedEvent;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
       
    }
  

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Event::listen(
            PostCreatedEvent::class,
            PostListener::class,
        );
    }
}
