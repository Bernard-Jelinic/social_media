<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Notifications\Channels\DatabaseChannel;
use \Illuminate\Notifications\Channels\DatabaseChannel as BaseDatabaseChannel;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->instance(BaseDatabaseChannel::class, new DatabaseChannel());
    }
}
