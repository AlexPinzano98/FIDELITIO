<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmergencyCallReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $UserController;

    public function __construct($UserController)
    {
        $this->UserController = $UserController;
    }

    public function build()
    {
        return $this->view('mail_registro')->subject('Registro Completado');
    }
}
