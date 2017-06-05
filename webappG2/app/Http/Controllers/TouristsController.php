<?php

namespace App\Http\Controllers;

use App\Tourist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Intervention\Image;

class TouristsController extends Controller
{
    /**
     * TouristsController constructor.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show application dashboard
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function profile()
    {
        return view('tourists.profile', array('tourist' => Auth::user()));
    }

    public function update_tourist_avatar(Request $request)
    {
        if($request->hasFile('avatar'))
        {
            $avatar = $request->file('avatar');
            $file_name = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(250, 250)->save(public_path('uploads/avatars/' . $file_name));

            $user = Auth::user();
            $user->avatar = $file_name;
            $user->save();
        }
        return view('tourists.profile', array('tourist' => Auth::user()));
    }
}
