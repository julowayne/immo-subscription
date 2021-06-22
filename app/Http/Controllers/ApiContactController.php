<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\contact;

class ApiContactController extends Controller
{
    function sendMail(Request $request){
        $request->validate([
            'lastname' => 'required',
            'firstname' => 'required',
            'email' => 'required',
            'object' => 'required',
            'message' => 'required',
        ]);

        $information = [
            'lastname' => $request->last_name,
            'firstname' => $request->first_name,
            'email' => $request->email,
            'object' => $request->object,
            'message' => $request->message,
        ];
        Mail::send('emails.contact', $information, function ($m) use($information){
            $m->from($_ENV['MAIL_FROM_ADDRESS'], $_ENV['MAIL_FROM_NAME']);
            $m->to($information['email'])->subject($information['subject']);
        });

        // Mail::to(request('email'))->send(new \App\Mail\contact($information));
        // return response()->json([
        //     'success' => "L'email a bien été envoyé",
        // ]);
    }
}
