<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;


class TransactionController extends Controller
{
    /**
     * Display the registration view.
     */
    public function index(): View
    {
        //get all transactions
        $transactions  = Transaction::where('receiver_user_id', Auth::id())
                         ->with('user')    
                        ->get();
                        
        return view('transaction.index')->with(compact('transactions'));
    }
}
