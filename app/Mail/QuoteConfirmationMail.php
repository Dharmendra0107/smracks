<?php

namespace App\Mail;

use App\Models\QuoteRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class QuoteConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public QuoteRequest $quoteRequest;

    public function __construct(QuoteRequest $quoteRequest)
    {
        $this->quoteRequest = $quoteRequest;
    }

    public function build()
    {
        return $this
            ->subject('We\'ve received your quote request — SM Racks')
            ->view('emails.quote-confirmation');
    }
}