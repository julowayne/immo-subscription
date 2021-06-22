<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

        Mail::to(request('email'))->send(new \App\Mail\contact($information));
        return response()->json([
            'success' => "L'email a bien été envoyé",
        ]);
    }
}