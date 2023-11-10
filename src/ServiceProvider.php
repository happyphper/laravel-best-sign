<?php

namespace Happyphper\LaravelBestSign;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * @var bool
     */
    protected bool $defer = true;

    public function register(): void
    {
        $this->app->singleton('LaravelBestSign', function ($app) {
            return new LaravelBestSign($app['config']);
        });
    }

    /**
     * @return void
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/bestsign.php' => $this->app->configPath('bestsign.php'),
        ]);

        $this->mergeConfigFrom(__DIR__ . '/../config/logging.php', 'logging.channels.bestsign');
    }
}
