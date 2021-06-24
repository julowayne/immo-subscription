<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ApiCheckoutController extends Controller
{
    public function intent(Request $request)
    {
        $user = User::find($request->id);

        return response()->json($user->createSetupIntent());
    }
}
