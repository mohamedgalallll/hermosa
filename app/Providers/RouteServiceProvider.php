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
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapAdminRoutes();

//        $this->mapSiteRoutes();


        $this->mapAuthRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web', 'lang')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }
    protected function mapAdminRoutes()
    {
        Route::middleware(['web','admin','lang','customizer'])
            ->prefix('admin')
            ->namespace($this->namespace."\Admin")
            ->group(base_path('routes/admin.php'));
    }

    protected function mapAuthRoutes()
    {
        Route::middleware(["web","auth",'lang'])
            ->namespace($this->namespace)
            ->group(base_path('routes/auth.php'));
    }
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace."\Api")
            ->group(base_path('routes/api.php'));
    }
}
