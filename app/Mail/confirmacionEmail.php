<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class confirmacionEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $token;
    public $pass;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user,$token,$pass)
    {
        $this->user = $user;
        $this->token = $token;
        $this->pass = $pass;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.confirmacionEmail')
        ->subject('Bienvenido a webShopOnline');
    }
}
