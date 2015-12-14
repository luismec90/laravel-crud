<?php namespace Montoya\Crud;

use Illuminate\Support\ServiceProvider;

class CrudServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Route
        include __DIR__ . '/routes.php';

        // View
        $this->loadViewsFrom(__DIR__ . '/Views', 'crud');

        $this->publishes([
            __DIR__ . '/Config/crud.php' => config_path('crud.php'),
        ], 'config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app['crud'] = $this->app->share(function ($app) {
            return new Crud;
        });
    }
}
