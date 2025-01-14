<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $isSuccess, $logo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $id, $code)
    {
        $this->user = $user;
        $this->id = $id;
        $this->code = $code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('mariyisus613@gmail.com', 'Acitivy Admin')
        ->subject('Your Registration is Successful!!!')
        ->view('emails.user_email',['name'=>$this->user, 'id'=>$this->id, 'code'=>$this->code]);
    }
}