<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Deposit;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    public function messages(): array
    {
        return [
            'refer_by.gdgdgd' => 'Code not found'
        ];
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'refer_by' => ['max:4'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        
        $refer_by = 0 ;

        if(!empty($request->refer_by))
        {  

            $user = User::where('id', '=', $request->refer_by)->first();

            $customMessages =  [
                'refer_by.email' => 'Code not found'
            ];
            
            if ($user === null) {
                    $request->validate([
                             'refer_by' => ['email'],
                        ], $customMessages);       
            }

            $refer_by = $request->refer_by;
        }
        
      

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'refer_by' => $refer_by,
        ]);

        Auth::login($user);
        
        //create wallet
        $user = Deposit::create([
            'amount' => 0,
            'user_id' => Auth::id(),
        ]);

        event(new Registered($user));


        return redirect(RouteServiceProvider::HOME);
    }
}
