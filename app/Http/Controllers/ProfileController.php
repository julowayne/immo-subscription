<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class ProfileController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'siret' => 'required|max:14|unique',
            'password' => 'required|max:10|unique'
        ]);
        
        $createUser = new User;
        $createUser->firstname = $request->input('firstName');
        $createUser->lastname = $request->input('lastName');
        $createUser->email = $request->input('email');
        $createUser->siret = $request->input('siret');
        $createUser->password = Hash::make($request->input('password'));
        $createUser->isAdmin = $request->input('isAdmin');
        if($createUser->avatar != $request->avatar){
            if(!empty($createUser->avatar_id)){
                cloudinary()->uploadApi()->destroy($createUser->avatar_id);
            }
            $avatar = $request->avatar->storeOnCloudinary();
            $createUser->avatar = $avatar->getPath();
            $createUser->avatar_id = $avatar->getPublicId();
        }
        $createUser->save();
        $request->session()->flash('message', 'Votre nom a bien été modifié');

        return redirect()->back();
    }

    public function update(Request $request){
        
        $user = User::where('id', $request->id )->first();
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');
        $user->siret = $request->input('siret');
        $user->isAdmin = $request->input('isAdmin');
        if($user->password != $request->password && !empty($request->password)){
            $user->password = $request->input('password');
        }

        if($user->avatar != $request->avatar){
            if(!empty($user->avatar_id)){
                cloudinary()->uploadApi()->destroy($user->avatar_id);
            }
            $avatar = $request->avatar->storeOnCloudinary();
            $user->avatar = $avatar->getPath();
            $user->avatar_id = $avatar->getPublicId();
        }
        $user->save();
        return redirect()->back();
    }

    public function getAllUsers(){
        
        $users = User::all();
        return Inertia::render('Admin/UserDashboard', ["users" => $users]);
    }

    public function destroy(Request $request)
    {
        $user = User::where('id', $request->id )->first();
        cloudinary()->uploadApi()->destroy($user->avatar);
        $user->delete();
        return redirect()->back();
    }
}
