<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
// use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\admin;

class AuthenticationController extends Controller
{
    /**
     * Display the login view.
     */
    public function index(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function login(Request $request) : RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $is_admin = false;

        // Check if the credentials match the admin account
        if ($credentials['email'] === 'admin@admin.com' && $credentials['password'] === 'admin') {
            $is_admin = true;
        }

        // Attempt to log in as admin if the credentials match
        if ($is_admin) {
            $admin = admin::where('email', 'admin@admin.com')->first();
            if ($admin) {
                Auth::login($admin);

                return redirect()->intended('admin/dashboard');

                //return redirect()->intended('resources/views/admin/index.blade.php');
                return redirect()->route('admin.index');

                //return redirect()->intended('resources/views/admin/index.blade.php');
                return redirect()->route('admin.index');
            }
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('phonebook');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
