<?php

namespace App\Providers;

use App\Repositories\KelompokTaniRepository;
use App\Repositories\UserRepository;
use BibitBerkualitasRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\AuthPhoneRepository;
use App\Repositories\Interfaces\AuthPhone;
use App\Repositories\Interfaces\BibitRepositoryInterface;
use App\Repositories\Interfaces\KelompokTaniRepositoryInterface;
use App\Repositories\Interfaces\KomoditasRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\KomoditasRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthPhone::class, AuthPhoneRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(KomoditasRepositoryInterface::class, KomoditasRepository::class);
        $this->app->bind(KelompokTaniRepositoryInterface::class, KelompokTaniRepository::class);
        $this->app->bind(BibitRepositoryInterface::class, BibitBerkualitasRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
