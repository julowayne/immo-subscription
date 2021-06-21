<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $plan = Plan::find($request->plan);

        try {
            $subscription = $request->user()
                ->newSubscription('default', $plan->stripe_id)
                ->withCoupon($request->coupon)
                ->create($request->payment_method);
            return response()->json($subscription);
        } catch (\Laravel\Cashier\Exceptions\IncompletePayment $e) {
            return response()->json($e->payment);
        }
    }
}
