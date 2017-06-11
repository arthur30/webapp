<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuideLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.guide-login');
    }

    public function login(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = ['email' => $request->email, 'password' => $request->password];
        $remember = $request->remember;

        // Attempt to log in the user
        if (Auth::guard('guide')->attempt($credentials, $remember))
        {
            // If successful, redirect to their dashboard
            //return redirect()->intended(route('guide.dashboard'));
            return redirect(route('guide.dashboard'));

        }

        // If unsuccessful, redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }
}
