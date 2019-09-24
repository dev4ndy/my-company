<?php

namespace App\Listeners;

use App\Events\CompanyAdded;
use App\Mail\CreateCompany;
use Mail;

class SendCreateCompanyEmail
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
     * @param  CompanyAdded  $event
     * @return void
     */
    public function handle(CompanyAdded $event)
    {
        $company = $event->company;
        Mail::to($company->email)
        ->queue(new CreateCompany($company));
    }
}
