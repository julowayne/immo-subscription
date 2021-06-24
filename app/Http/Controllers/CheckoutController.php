<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
    public function newIntent(){
        return Auth::user()->createSetupIntent();
    }

    public function subscribe(Request $request){

        $request->validate([
            'name' => 'required',
            'payment_method' => 'required',
            'coupon' => 'nullable'
        ]);
        
        try {
            $subscription = $request->user()
                ->newSubscription('default', $request->plan)
                ->withCoupon($request->coupon)
                ->create($request->payment_method);

            Mail::to(Auth::user()->email)->send(new \App\Mail\Subscription($subscription));
    
            return response()->json($subscription);
        // return Inertia::render('SubscribeConfirmation', ["subscription" => $subscription]); 
        } catch (\Laravel\Cashier\Exceptions\IncompletePayment $e) {
            return response()->json($e->payment);
        }
        // return Redirect::route('/services/abonnement/confirmation');
    }
}
