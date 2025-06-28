<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
<<<<<<< HEAD
use Illuminate\Support\Facades\Gate; // ✅ importante
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProviderBase;
=======
>>>>>>> ebc6dc6c98c2a0d0e561349a318e9bada016eb32

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
<<<<<<< HEAD
        // ✅ Aquí defines el permiso para bibliotecario
        Gate::define('bibliotecario', function ($user) {
            return $user->rol === 'bibliotecario';
        });
=======
        //
>>>>>>> ebc6dc6c98c2a0d0e561349a318e9bada016eb32
    }
}
