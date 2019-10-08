<?php

namespace Tallmancode\OverWatch;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Routing\Router;
use Tallmancode\OverWatch\Http\Middleware\OverWatchAdminMiddleware;
use Tallmancode\OverWatch\Facades\OverWatch as OverWatchFacade;
use Tallmancode\OverWatch\Facades\Menu as MenuFacade;

class OverWatchServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadHelpers();

        $loader = AliasLoader::getInstance();
        $loader->alias('OverWatch', OverWatchFacade::class);
        $loader->alias('Menu', MenuFacade::class);

        $this->app->singleton('overwatch', function () {
            return new OverWatch();
        });

        $this->app->singleton('menu', function () {
            return new Menu();
        });


        $this->app->singleton('OverWatchAuth', function () {
            return auth();
        });


    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php', 'OverWatch');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'OverWatch');
        $this->loadMigrationsFrom(__DIR__.'/assets/migrations', 'OverWatch');
        $router->aliasMiddleware('admin.user', OverWatchAdminMiddleware::class);
      // dd(__DIR__.'/assets/migrations', 'OverWatch');

    }

    /**
     * Load helpers.
     */
    protected function loadHelpers()
    {
        foreach (glob(__DIR__.'/Helpers/*.php') as $filename) {
            require_once $filename;
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [OverWatch::class];
    }
}
