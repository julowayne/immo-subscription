<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ApiAuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'firstname' => 'required',
            'lastname' => 'required',
            'siret' => 'required',
            'password' => 'required',
        ]);

        $user =  User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'siret' => $request->siret,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken($request->fisrtname)->plainTextToken;

        return response()->json([
            'token' => $token,
            'email' => $user->email,
            'password' => $user->password,
            'firstname' => $user->firstname,
            'lastname' => $user->firstname,
            'created_at' => $user->created_at,
        ]);
        
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['error'=>'Les identifiants ne sont pas corrects'], 401);
        }

        $user->tokens()->where('tokenable_id', $user->id)->delete();

        $token = $user->createToken( $request->email)->plainTextToken;

        return response()->json([
            'token' => $token,
            'id' => $user->id,
            'email' => $user->email,
            'firstname' => $user->firstname,
            'lastname' => $user->lastname,
            'created_at' => $user->created_at,
            'is_admin' => $user->is_admin,
        ]);
    }

    function sendMail(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'object' => 'required',
            'message' => 'required',
        ]);

        $information = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'object' => $request->object,
            'message' => $request->message,
        ];

        Mail::to(request('email'))->send(new \App\Mail\contact($information));
        return response()->json([
            'success' => 'mail Send',
        ]);
    }
}
