<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Deposit;
use App\Models\Transaction;
use App\Models\Helpers;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class DepositController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $balance = Deposit::where ('user_id', Auth::id())->first()->amount;

        return view('deposit.create')->with('balance', $balance);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request): View
    {
        $request->validate([
            'amount' => ['required', 'numeric', 'min:10'],

        ]);
        
        $user= Auth::user();
        
        //deposit money in wallet
        Deposit::where('user_id', $user->id)->increment('amount', $request->amount); 

        //create transaction 
        Transaction::create([
            'receiver_user_id' => $user->id,
            'amount' => $request->amount,
            'description' => 'Deposit',
            'level' => 0,
        ]);

        $balance = Deposit::where ('user_id', $user->id)->first()->amount;

        //distrubute amount to referral 
        if($user->refer_by != 0) {
            Helpers::distriubteAmount($request->amount);
        }

        return view('deposit.create')->with('balance', $balance);
    }
}
