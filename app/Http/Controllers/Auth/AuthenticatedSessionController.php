<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        //if request->user->status == pending, return with a message 


        $request->authenticate();
        $request->session()->regenerate();

        if (Auth::user()->status === 'pending') {

            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            // return redirect()->route('login')->withErrors(['email' => 'Your account is pending approval.']);
            return redirect()->route('login')->with('status', 'Your account is pending approval.');
        } else {

            //get the user name
            $username = Auth::user()->name;

            return redirect()->intended(route('home', absolute: false))->with('success', "Welcome $username!");
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
