<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\User;
use App\Guide;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class GuideRegisterController extends Controller
{
    /**
     * Create a new controller instance.
     * Acts like a filter. It specifies who is able to make through that filter
     * If you are already logged in, you don't have access to the other methods (i.e. you can't register twice)
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('auth.guide-register');
    }

    public function register(Request $request)
    {
        // Validate the registration form data
        $this->validate($request, [
            'first_name' => 'required|string|max:30',
            'family_name' => 'required|string|max:30',
            'nationality' => 'required|string|max:30',
            'home_town' => 'required|string|max:30',
            'phone_number' => 'required|string|max:30',
            'education' => 'required|string|max:30',
            'email' => 'required|string|email|max:255|unique:guides',
            'password' => 'required|string|min:6',
        ]);

        // Create a new guide instance after a valid registration
        Guide::create([
            'name' => $request['first_name'] . ' ' . $request['family_name'],
            'first_name' => $request['first_name'],
            'family_name' => $request['family_name'],
            'nationality' => $request['nationality'],
            'home_town' => $request['home_town'],
            'phone_number' => $request['phone_number'],
            'education' => $request['education'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

        // Log in the guide and redirect them to the dashboard
        return redirect(route('guide.dashboard'));
    }
}
