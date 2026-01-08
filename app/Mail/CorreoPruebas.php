<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CorreoPruebas extends Mailable
{
    use Queueable, SerializesModels;

    public string $tokenUrl;

    public function __construct($tokenUrl)
    {
        $this->tokenUrl = $tokenUrl;
    }

    public function build()
    {
        return $this
            ->subject('Activación de cuenta')
            ->view('emails.prueba');
    }
}

