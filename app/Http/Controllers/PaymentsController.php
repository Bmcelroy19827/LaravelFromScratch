<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\PaymentReceived;

class PaymentsController extends Controller
{
    //
    public function create()
    {
        return view('payments.create');
    }

    public function store()
    {
        // Pretend payment sent
        request()->user()->notify(new PaymentReceived());
        //Notification::send(request()->user(), new PaymentReceived());

        return redirect('/')
            ->with('message', 'Payment Received!');        
    }
}
