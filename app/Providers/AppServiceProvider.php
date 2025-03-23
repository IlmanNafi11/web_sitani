<?php

namespace App\Providers;

use App\Repositories\AuthPhoneRepository;
use App\Repositories\Interfaces\AuthPhone;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthPhone::class, AuthPhoneRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
