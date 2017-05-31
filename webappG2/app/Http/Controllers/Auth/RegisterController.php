<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Tourist;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUserS;

    /**
     * Where to redirect users after registration.
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     * Acts like a filter. It specifies who is able to make through that filter
     * If you are already logged in, you don't have access to the other methods (i.e. you can't register twice)
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @returnp
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|string|max:20',
            'family_name' => 'required|string|max:30',
            'nationality' => 'required|string|max:30',
            'phone_number' => 'required|string|max:30',
            'email' => 'required|string|email|max:255|unique:tourists',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return Tourist::create([
            'first_name' => $data['first_name'],
            'family_name' => $data['family_name'],
            'nationality' => $data['nationality'],
            'phone_number' => $data['phone_number'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
