<?php
/**
 * Created by PhpStorm.
 * User: fanxinyu
 * Date: 2020-11-13
 * Time: 16:35
 */

namespace Daviswwang\LaravelOSS;

use Illuminate\Support\ServiceProvider;


class LaravelServiceProvider extends ServiceProvider
{

    protected $defer = true;

    public function register()
    {
        $this->app->singleton(LaravelOSS::class, function () {
            return new LaravelOSS(config('oss.default'));
        });

        $this->app->alias(LaravelOSS::class, 'laraveloss');
    }

    public function provides()
    {
        return [LaravelOSS::class, 'laraveloss'];
    }

    public function boot()
    {
        $path = realpath(__DIR__ . '/Config/AliConfig.php');

        $this->publishes([$path => config_path('oss.php')], 'config');
        $this->mergeConfigFrom($path, 'laraveloss');
    }


}