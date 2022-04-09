<?php

namespace Laravelir\Toaster\Providers;

use Illuminate\Routing\Router;
use Laravelir\Toaster\Toaster;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Laravelir\Http\Middleware\ToasterMiddleware;
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
        // $this->registerBladeDirectives();
    }

    private function registerFacades()
    {
        $this->app->bind('toaster', function ($app) {
            return new Toaster();
        });
    }

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
    //         __DIR__ . '/../../resources/statics' => public_path('toaster'),
    //     ], 'toaster-assets');
    // }


    public function registerTranslations()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'toaster');

        $this->publishes([
            __DIR__ . '/../../resources/lang' => resource_path('lang/laravelir/toaster'),
        ], 'toaster-langs');
    }


    protected function registerBladeDirectives()
    {
        Blade::directive('toaster_config', function ($key) {
            return "<?php echo config('toaster.' . $key); ?/>";
        });
    }

    protected function registerMiddleware(Router $router)
    {
        $router->aliasMiddleware('toaster', ToasterMiddleware::class);
    }
}
