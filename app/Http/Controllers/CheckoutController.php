<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class CheckoutController extends Controller
{
    public function index(){
        $plans = Plan::get();
        return Inertia::render('Subscribe', $plans);
        dd($plans);
    }

    public function store(){

        return Redirect::route('/services', 'Subscribe');

    }
}
