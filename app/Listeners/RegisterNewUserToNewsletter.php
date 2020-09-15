<?php

namespace App\Listeners;

use App\Events\NewCustomerRegistrationEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterNewUserToNewsletter
{


    /**
     * Handle the event.
     *
     * @param  NewCustomerRegistrationEvent  $event
     * @return void
     */
    public function handle(NewCustomerRegistrationEvent $event)
    {
        // //register to newsletter
        dump("registered to newsletter");
    }
}
