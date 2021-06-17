<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ProfileController extends Controller
{

    public function update(Request $request){
        
        $user = User::where('id', Auth::id())->first();
        $user->firstname = $request->input('firstName');
        $user->lastname = $request->input('lastName');
        $user->siret = $request->input('siret');
        $user->password = $request->input('password');
        $request->avatar->storeOnCloudinary();
        $user->save();
        $request->session()->flash('message', 'Votre nom a bien été modifié');
        return Inertia::render('Profile');
    }

    public function getAllUsers(){
        
        $users = User::all();
        return Inertia::render('Admin/UserDashboard', ["users" => $users]);
    }
}
