<?php

namespace App\Listeners;

use App\Events\NewCustomerRegistrationEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\WelcomeNewUserMail;
use Illuminate\Support\Facades\Mail;

class WelcomeNewUserListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewCustomerRegistrationEvent  $event
     * @return void
     */
    public function handle(NewCustomerRegistrationEvent $event)
    {
        sleep(10);
        //send them email
        Mail::to($event->user->email)->send(new WelcomeNewUserMail());
    }
}
