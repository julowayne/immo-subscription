<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;


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
            'lastname' => $request->lastname,
            'firstname' => $request->firstname,
            'email' => $request->email,
            'object' => $request->object,
            'message' => $request->message,
        ];

        Mail::to(request('email'))->send(new \App\Mail\Contact($information));
        return response()->json([
            'success' => "L'email a bien été envoyé",
        ]);
    }

    function sendDesktopMail(Request $request){
        $request->validate([
            'lastname' => 'required',
            'firstname' => 'required',
            'email' => 'required',
            'object' => 'required',
            'message' => 'required',
        ]);

        $information = [
            'lastname' => $request->lastname,
            'firstname' => $request->firstname,
            'email' => $request->email,
            'object' => $request->object,
            'message' => $request->message,
        ];

        Mail::to(request('email'))->send(new \App\Mail\Contact($information));
        return Inertia::render('Contact');
    }
}
