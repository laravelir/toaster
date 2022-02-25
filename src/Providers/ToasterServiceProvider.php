<?php

namespace Laravelir\Toaster\Providers;

use App\Http\Kernel;
use Illuminate\Routing\Router;
use Laravelir\Toaster\Toaster;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Laravelir\Http\Middleware\ToasterMiddleware;
use Laravelir\Toaster\Facades\Toaster as ToasterFacade;
use Laravelir\Toaster\Console\Commands\InstallPackageCommand;

class ToasterServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . "/../../config/toaster.php", 'toaster');

        // $this->registerViews();

        $this->registerFacades();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        $this->registerCommands();
        // $this->registerTranslations();
        // $this->registerAssets();
        // $this->registerRoutes();
        // $this->registerBladeDirectives();
        // $this->publishStubs();
        // $this->registerLivewireComponents();
    }

    private function registerFacades()
    {
        $this->app->bind('toaster', function ($app) {
            return new Toaster();
        });
    }

    // private function registerViews()
    // {
    //     $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'toaster');

    //     $this->publishes([
    //         __DIR__ . '/../../resources/views' => resource_path('views/laravelir/toaster'),
    //     ]);
    // }


    private function registerCommands()
    {
        if ($this->app->runningInConsole()) {

            $this->commands([
                InstallPackageCommand::class,
            ]);
        }
    }

    public function publishConfig()
    {
        $this->publishes([
            __DIR__ . '/../../config/toaster.php' => config_path('toaster.php')
        ], 'toaster-config');
    }

    // private function registerAssets()
    // {
    //     $this->publishes([
    //         __DIR__ . '/../../resources/statics' => public_path('dashboarder'),
    //     ], 'dashboarder-assets');
    // }


    public function registerTranslations()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'dashboarder');

        $this->publishes([
            __DIR__ . '/../../resources/lang' => resource_path('lang/laravelir/dashboarder'),
        ], 'dashboarder-langs');
    }


    protected function registerBladeDirectives()
    {
        Blade::directive('toaster_config', function ($key) {
            return "<?php echo config('dashboarder.' . $key); ?/>";
        });
    }

    protected function registerMiddleware(Router $router)
    {
        $router->aliasMiddleware('toaster', ToasterMiddleware::class);
    }
}
