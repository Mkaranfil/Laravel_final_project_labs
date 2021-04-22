<?php

namespace App\Mail;

use App\Models\ContactSubject;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;
    public $info; 
    public $subjectFind;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->info = $request;
        $subjectF = ContactSubject::find($request->subject_id);
        $this->subjectFind = $subjectF->subject;


    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->info->email)->subject('Subject:'.$this->subjectFind)->view('mail/contactFormMail')->with(['info'=>$this->info,'subjectFind'=>$this->subjectFind]);

    }
}
