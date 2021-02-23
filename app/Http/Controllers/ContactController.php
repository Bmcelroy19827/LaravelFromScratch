<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMe;

class ContactController extends Controller
{

    public function show(){
        return view ('contact');
    }

    public function store(){
        // send the email
        request()->validate([
            'email' => 'required|email'
            ,'topic' => 'required'
        ]);
        //$email = request('email');

        // Mail::raw('It works!', function ($message) {
        //     $message->to(request('email'))
        //         ->subject('Hello There');
        // });

        Mail::to(request('email'))
            ->send(new ContactMe(request('topic')));

        return redirect('/contact')
            ->with('message', 'Email sent!');

        //dd($email);
    }

}
