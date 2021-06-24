<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class CheckoutController extends Controller
{
    public function index(){
        // $plans = Plan::get();
        // return Inertia::render('Admin/SubscribeDashboard', ['plans' => $plans]);
    }

    public function store(){

        $plans = Plan::get();
        return Inertia::render('Admin/SubscribeDashboard', ['plans' => $plans]);
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
        
        $admin = User::query()->where('isAdmin', "TRUE")->first();
        $emails = [$admin->email, Auth::user()->email];

        try {
            $subscription = $request->user()
                ->newSubscription('default', $request->plan)
                ->withCoupon($request->coupon)
                ->create($request->payment_method);

            Mail::to($emails)->send(new \App\Mail\Subscription($subscription));
    
            return response()->json($subscription);

        } catch (\Laravel\Cashier\Exceptions\IncompletePayment $e) {
            return response()->json($e->payment);
        }
    }
}
