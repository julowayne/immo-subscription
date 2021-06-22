<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;
use App\Mail\Contact;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function sendmail(Request $request){
        // $user = Auth::user();
        // Mail::to($request->email)->send(new Contact);
        // return redirect()->home();
        // return Inertia::render('contact');

    //  }
    // public function contact(Request $request){
    //     $params = [
    //         'firstName' => $request->get('firstname'),
    //         'lastName' => $request->get('firstname'),
    //         'email' => $request->get('email'),
    //         'object' => $request->get('object'),
    //         'message' => $request->get('message'),
    //     ];
    //     Mail::send('Contact', $params, function ($m) use($params){
    //         $m->from($_ENV['MAIL_FROM_ADDRESS'], $_ENV['MAIL_FROM_NAME']);
    //         $m->to($params['email'])->subject('Contact');
    //     });
    //     return Inertia::render('Contact');
     }
}
