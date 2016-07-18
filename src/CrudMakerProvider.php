<?php

namespace Yab\CrudMaker;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class CrudMakerProvider extends ServiceProvider
{
    /**
     * Boot method.
     *
     * @return void
     */
    public function boot()
    {
        if (!is_dir(base_path('resources/crudmaker/crud'))) {
            mkdir(base_path('resources/crudmaker/crud'), 0777, true);
        }

        $this->publishes([
            __DIR__.'/Templates'                               => base_path('resources/crudmaker/crud'),
            __DIR__.'/../config/crudmaker.php'    => base_path('config/crudmaker.php'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        /*
        |--------------------------------------------------------------------------
        | Register the Commands
        |--------------------------------------------------------------------------
        */

        $this->commands([
            \Yab\CrudMaker\Console\CrudMaker::class,
            \Yab\CrudMaker\Console\TableCrudMaker::class,
        ]);
    }
}
