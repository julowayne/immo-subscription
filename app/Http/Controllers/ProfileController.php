<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ProfileController extends Controller
{
    public function create(Request $request)
    {
        $createUser = new User;
        $createUser->firstname = $request->input('firstName');
        $createUser->lastname = $request->input('lastName');
        $createUser->email = $request->input('email');
        $createUser->siret = $request->input('siret');
        $createUser->password = $request->input('password');
        $request->avatar->storeOnCloudinary();
        $createUser->save();
        $request->session()->flash('message', 'Votre nom a bien été modifié');

        return Inertia::render('admin/userdashboard');
    }

    public function update(Request $request){
        
        $user = User::where('id', Auth::id())->first();
        $user->firstname = $request->input('firstName');
        $user->lastname = $request->input('lastName');
        $user->email = $request->input('email');
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
