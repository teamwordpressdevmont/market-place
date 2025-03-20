<?php

namespace App\Listeners;

use App\Events\SubmitProposal;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SubmitProposalEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     */
    public function handle(SubmitProposal $event): void
    {
        //$to = 'dev.test@mailinator.com';
        $to = $event->proposal->customerEmail_Sender;

        $subject = 'Proposal Submitted on Job';

        $headers = "From: info@dashboard.ugcitalia.com\r\n" .
                    "MIME-Version: 1.0\r\n" .
                    "Content-type: text/html; charset=UTF-8\r\n";

        //$message = 'Proposal Submitted on Job';

        $message = view('emails.submitProposal' , [
            'current_user_tradeperson' => $event->proposal->current_user_tradeperson,
            'customer_name' => $event->proposal->customer_name,
            'order_title' => $event->proposal->order_title,
        ])->render();

        mail( $to, $subject, $message, $headers );
    }
}