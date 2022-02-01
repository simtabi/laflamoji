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

    public const PATH = __DIR__ . '/../../';

    public function register()
    {
        $this->mergeConfigFrom(self::PATH . 'config/laflamoji.php', 'laflamoji');

        $this->app->singleton(FlagFactory::class, function (Application $app) {
            $config = $app->make('config')->get('laflamoji');

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

    private function registerConsoles()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                self::PATH . 'config/laflamoji.php' => config_path('laflamoji.php'),
            ], 'laflamoji:config');

            $this->publishes([
                self::PATH . 'resources/assets/media'       => public_path('vendor/laflamoji'),
            ], 'laflamoji:assets');

            $this->publishes([
                self::PATH . 'resources/views'     => resource_path('views/vendor/laflamoji'),
            ], 'laflamoji:views');
        }
    }

}
