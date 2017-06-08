<?php

namespace PyaeHein\LQIP;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class LQIPServiceProvider extends ServiceProvider
{
    protected $aliases = [
        'Image' => 'Intervention\Image\Facades\Image'
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadPublish();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerAliases();
        $this->registerProvider();
        $this->registerConfig();
        $this->registerClass();
    }

    private function registerAliases()
    {
        $loader = AliasLoader::getInstance();
        foreach ($this->aliases as $key => $alias)
        {
            $loader->alias($key, $alias);
        }
    }

    private function registerProvider()
    {
        $this->app->register('Intervention\Image\ImageServiceProvider');
    }

    private function registerConfig()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/lqip.php', 'lqip'
        );
    }

    private function registerClass()
    {
        $this->app->singleton('LQIP', function ($app) {
            return new \PyaeHein\LQIP\LQIP();
        });
    }

    private function loadPublish()
    {
        $this->publishes([
            __DIR__.'/config/lqip.php' => config_path('lqip.php'),
            __DIR__ . '/public' => public_path(),
        ]);
    }
}
