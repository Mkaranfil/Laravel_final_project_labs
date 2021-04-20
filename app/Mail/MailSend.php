<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailSend extends Mailable
{
    use Queueable, SerializesModels;
    public $info;
  


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($valider)
    {
        $this->info = $valider; 
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->info->email)->subject('Bienvenue '.$this->info->prenom.' !')->view('mail/registerValidationMail')->with(['info'=>$this->info]);
    }
}
