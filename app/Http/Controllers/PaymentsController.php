<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\PaymentReceived;
use App\Events\ProductPurchased;

class PaymentsController extends Controller
{
    //
    public function create()
    {
        return view('payments.create');
    }

    public function store()
    {

        // process the payment
        // unlock the purchase

        // Make Event - ```php artisan make:event ProductPurchased```
        // Fire event: ProductPurchased
        ProductPurchased::dispatch('toy'); // event(new ProductPurchased('toy'));
        

        // listeners//
        // Notify the user about the payment
        request()->user()->notify(new PaymentReceived(900)); //Notification::send(request()->user(), new PaymentReceived());

        /**
         *award achievements - 
         *```php artisan make:listener AwardAchievements``` or be more specific ```php artisan make:listener AwardAchievements -e ProductPurchased```
         * Setup Actions in listener
         * Wire up listerner to event in Providers/EventServiceProvider 
         */
        
        /**
         * Send Shareable Coupon to user
         * ```php artisan make:listener -e ProductPurchased```
         * Setup code in listener
         * wire up listner to event in eventServiceProvider.php
         */

        // send shareable coupon to user

        //return redirect('/')
          //  ->with('message', 'Payment Received!');        
    }
}
