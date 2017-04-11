<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $webNamespace = 'App\Http\Controllers';

    /**
     * This namespace is applied to your API routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $apiNamespace = 'App\Http\Apis';

    /**
     * Define your route model bindings, pattern filters, etc.
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Define the routes for the application.
     */
    public function map()
    {
        $this->mapApiRoutes();
        $this->mapApiServiceRoutes();

        $this->mapWebRoutes();
        $this->mapWebServiceRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->webNamespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->apiNamespace)
             ->group(base_path('routes/api.php'));
    }

    /**
     * Map over the "web" routes defined by the services.
     *
     * These routes all receive session state, CSRF protection, etc.
     */
    protected function mapWebServiceRoutes()
    {
        app('App\Services\TeaBrewer\Http\Routes\Web')->map();
    }

    /**
     * Map over the "api" routes defined by the services.
     *
     * These routes are typically stateless.
     */
    protected function mapApiServiceRoutes()
    {
        app('App\Services\TeaBrewer\Http\Routes\Api')->map();
        app('App\Services\TeaSelector\Http\Routes\Api')->map();
    }
}
