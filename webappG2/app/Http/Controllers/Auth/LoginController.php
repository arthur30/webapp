<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     */
    protected $redirectTo = '/home';

    /**
     * LoginController constructor.
     * Acts like a filter. It specifies who is able to make through that filter
     * If you are already logged in, you don't have access to the other methods (i.e. you can't log in twice)
     * If you are logged in, you can access logout tho
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function create()
    {
        return view('tourists.show');
    }

    public function store()
    {
        if(!auth()->attempt(request(['email', 'password'])))
        {
            return back()->withErrors([
                'message' => 'Please check your email/password and try again'
            ]);
        }

        return redirect()->home(); // Show the application dashboard.
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->home();
    }
}
