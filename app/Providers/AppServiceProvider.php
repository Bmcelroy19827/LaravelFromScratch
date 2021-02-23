<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Collaborator;
use App\Models\Example;
use App\Models\Example_2;

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
        app()->singleton('App\Models\Example', function () {
            //fetch $foo from config >> services.php
            $foo = config('services.foo');
            $collaborator = new Collaborator();
            return new Example($collaborator, $foo);
        });

        $this->app->bind('example_2', function() {
            return new Example_2();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
