<?php

namespace App\Models;

use Illuminate\Support\Facades\Facade;


class Example_2Facade extends Facade
{
    protected static function getFacadeAccessor()
    {
       return 'example_2';
    }
}