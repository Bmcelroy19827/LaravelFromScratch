<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\NexmoMessage;

class PaymentReceived extends Notification
{
    use Queueable;

    //hardcoded in PaymentsController as an example
    protected $amount;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($amount)
    {
        //
        $this->amount = $amount;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database' ];//, 'nexmo'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject("Short this Weekend")
                    ->greeting("What's Happening")
                    ->line('The introduction to the notification.')
                    ->line("I'm gonna need you to come in on Sunday")
                    ->action('Pick Your spot', url('/'))
                    ->line('Thanks!');
    }

/**
 * Get the Vonage / SMS representation of the notification.
 *
 * @param  mixed  $notifiable
 * @return \Illuminate\Notifications\Messages\NexmoMessage
 */
    public function toNexmo($notifiable)
    {
        return (new NexmoMessage)
            ->content('SMS Payment Received!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //This is what will get stored in the database if that type of notification is sent
            'amount' => $this->amount
        ];
    }
}
