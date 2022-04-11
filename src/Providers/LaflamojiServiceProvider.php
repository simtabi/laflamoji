<?php

namespace Simtabi\Laflamoji\Providers;

use Simtabi\Laflamoji\Factories\FlagFactory;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Laflamoji;

class LaflamojiServiceProvider extends ServiceProvider
{

    private string $packageName = 'laflamoji';
    private const  PACKAGE_PATH = __DIR__ . '/../../';

    public function register()
    {
        $this->loadTranslationsFrom(self::PACKAGE_PATH . "resources/lang/", $this->packageName);
        $this->loadMigrationsFrom(self::PACKAGE_PATH.'database/migrations');
        $this->loadViewsFrom(self::PACKAGE_PATH . "resources/views", $this->packageName);
        $this->mergeConfigFrom(self::PACKAGE_PATH . "config/config.php", $this->packageName);

        $this->app->singleton(FlagFactory::class, function (Application $app) {
            $config = $app->make('config')->get($this->packageName);

            return new FlagFactory(new Filesystem(),
                $config['ratio'] ?? '',
                $config['class'] ?? ''
            );
        });
    }

    /**
     * @return void
     */
    public function boot()
    {
        Blade::directive('laflag', function ($expression) {
            return "<?php echo e(Laflamoji::flag($expression)); ?>";
        });

        Blade::directive('lamoji', function ($expression) {
            return "<?php echo e(Laflamoji::emoji($expression)); ?>";
        });

        $this->registerConsoles();
    }

    private function registerConsoles(): static
    {
        if ($this->app->runningInConsole())
        {

            $this->publishes([
                self::PACKAGE_PATH . "config/config.php"               => config_path("{$this->packageName}.php"),
            ], "{$this->packageName}:config");

            $this->publishes([
                self::PACKAGE_PATH . "public"                          => public_path("vendor/{$this->packageName}"),
            ], "{$this->packageName}:assets");

            $this->publishes([
                self::PACKAGE_PATH . "resources/views"                 => resource_path("views/vendor/{$this->packageName}"),
            ], "{$this->packageName}:views");

            $this->publishes([
                self::PACKAGE_PATH . "resources/lang"                  => $this->app->langPath("vendor/{$this->packageName}"),
            ], "{$this->packageName}:translations");
        }

        return $this;
    }

}
