<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookingMail extends Mailable
{
    use Queueable, SerializesModels;
  
    public $bookingData;
  
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($bookingData)
    {
        // p($bookingData);
        $this->bookingData = $bookingData;
    }
  
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Mail from cityroom.in')
                    ->view('emails.booking');
    }
}
