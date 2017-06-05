<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guide;
use Intervention\Image;

class GuidesController extends Controller
{
    /**
     * TouristsController constructor.
     * Uses the guide guard. Protects a tourist from being able to access the guide dashboard
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:guide');
    }

    /**
     * Show application dashboard
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('guides.index');
    }

    public function show($id) // If you pass Guide $guide then it will do Guide::find(wildcard)
    {
        $guide = Guide::find($id);

        return view('guides.show', compact('guide'));
    }

    public function profile()
    {
        return view('guides.profile', array('guide' => Auth::user()));
    }

    public function update_guide_avatar(Request $request)
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
