<?php

declare(strict_types=1);

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MerchMail extends Mailable
{
    use Queueable, SerializesModels;

    private array $data;
    private string $sender;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $data)
    {
       $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): static
    {
        return $this->from(config('services.mail.support'))->view('mail.merch')->with('data', $this->data);
    }

}
