<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guide;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

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
        // return view('guides.profile', array('guide' => Auth::user()));
        $guide = Auth::user();

        return view('guides.profile', compact('guide'));
    }

    public function update_guide_avatar(Request $request)
    {
        if($request->hasFile('avatar'))
        {
            $avatar = $request->file('avatar');
            $file_name = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(250, 250)->save(public_path('/uploads/avatars/' . $file_name));

            $guide = Auth::user();
            $guide->avatar = $file_name;
            $guide->save();
        }
        return view('guides.profile', array('guide' => Auth::user()));
    }
}
