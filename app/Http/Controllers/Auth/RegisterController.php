<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
// use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use App\Models\User;



class RegisterController extends Controller
{
    /**
     * Display the login view.
     */
    public function index(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function register(Request $request)
    {

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->back()->with('message', 'Successfully registered');
    }

}
