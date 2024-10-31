<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\support\facades\DB;
use Illuminate\support\facades\log;
use Illuminate\database\events\QueryExecuted;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        DB::listen(function(QueryExecuted $sql){
            log::info(json_encode($sql->sql));
        });
    }
}
