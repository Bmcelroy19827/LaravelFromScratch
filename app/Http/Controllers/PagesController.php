<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Example;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Request as Req;


class PagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
    {
        //return request('name');
        if (request('name')){
            return Req::input('name');
        }
        //return view('welcome');
        return View::make('welcome');
    }

    //use services container
    // public function home(Example $example)
    // {
    //     dd($example);
    // }
}
