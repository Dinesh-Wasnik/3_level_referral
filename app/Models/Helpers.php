<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Deposit;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Helpers extends Model
{
    use HasFactory;


    //distribute earning among referral
    public static function distriubteAmount($amount){

        $level_1 = ($amount * 10)/ 100;
        $level_2 = ($amount * 5)/ 100;
        $level_3 = ($amount * 3)/ 100;


        $referUser=$user=Auth::user();

        for($i=1; $i<=3;$i++)
        {

           if($referUser->refer_by == 0) {
                break;
            }


            Deposit::where('user_id', $referUser->refer_by)->increment('amount',${'level_'.$i} );

            Transaction::create([
                    'receiver_user_id' => $referUser->refer_by,
                    'sender_user_id' => $user->id,
                    'amount' =>${'level_'.$i},
                    'description' => 'earning',
                    'level' => $i,
                ]); 

            $referUser = User::where('id', $referUser->refer_by)->first();

        }     
    }
}
