<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        $user = [
            'firstname' => $request->get('firstName'),
            'lastname' => $request->get('firstName'),
            'email' => $request->get('email'),
            'object' => $request->get('object'),
            'message' => $request->get('message'),
        ];
        return $this->view('emails.contact', compact('user'));     
    }
}
