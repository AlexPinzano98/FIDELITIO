<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RestaurarContra extends Mailable
{
    use Queueable, SerializesModels;

    public $UserController;

    public function __construct($UserController)
    {
        $this->UserController = $UserController;
    }

    public function build()
    {
        return $this->view('mail_recuperacion')->subject('Recuperar Contraseña');
    }
}

