<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubscribeMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public mixed $subscribe;

    public function __construct($subscribe = [])
    {
        $this->subscribe = $subscribe;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): static
    {
        return $this->markdown('vendor.mail.subscribe', [
            'form' => $this->subscribe,
        ])->subject('Abunə olunma');
    }
}
