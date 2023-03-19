<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {   
        $password = Hash::make('123456789');
        \App\Models\User::factory()->create([
            'password' =>$password,
            'refer_by'=> 0
        ]);

         \App\Models\User::factory()->create([
            'password' =>$password,
            'refer_by'=> 1
        ]);


        \App\Models\User::factory()->create([
            'password' =>$password,
            'refer_by'=> 2
        ]);

         \App\Models\User::factory()->create([
            'password' =>$password,
            'refer_by'=> 3
        ]);


        \App\Models\User::factory()->create([
            'password' =>$password,
            'refer_by'=> 4
        ]); 

        \App\Models\User::factory()->create([
            'password' =>$password,
            'refer_by'=> 0
        ]);  


        //create wallets
        for($i=1;$i<=6;$i++)
        {
            \App\Models\Deposit::factory()->create([
                'user_id'=> $i
            ]); 
        }
            
    }
}
