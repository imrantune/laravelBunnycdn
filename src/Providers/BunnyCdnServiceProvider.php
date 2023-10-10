<?php
/**
 * User: Imrantune
 * Date: 26.09.2020
 * Time: 13:25
 */

namespace Imrantune\LaravelBunnyCdn\Providers;

use Illuminate\Support\ServiceProvider;
use Storage;
use Imrantune\LaravelBunnyCdn\Filesystem\BunnyCDNStorage;
use Imrantune\LaravelBunnyCdn\Filesystem\BunnyCDNAdapter;
use League\Flysystem\Filesystem;

class BunnyCdnServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Storage::extend('bunnycdn', function($app, $config)
        {
            $client = new BunnyCDNAdapter(new BunnyCDNStorage($config['zone'], $config['apikey'], $config['region']));

            return new Filesystem($client);
        });
    }
}
