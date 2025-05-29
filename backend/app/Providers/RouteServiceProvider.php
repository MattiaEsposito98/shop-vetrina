<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
  /**
   * Percorso predefinito post-login.
   */
  public const HOME = '/home'; // ← MODIFICA QUI se vuoi cambiare il redirect dopo login

  public function boot(): void
  {
    $this->routes(function () {
      Route::middleware('web')
        ->group(base_path('routes/web.php'));

      Route::prefix('api')
        ->middleware('api')
        ->group(base_path('routes/api.php'));
    });
  }
}
