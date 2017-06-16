<?php

namespace App\Http\Controllers;

use App\Tourist;
use App\Guide;
use App\ContactUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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
        return view('tourists.index');
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
            Image::make($avatar)->resize(250, 250)->save(public_path('/uploads/avatars/' . $file_name));

            $tourist = Auth::user();
            $tourist->avatar = $file_name;
            $tourist->sex = "male";
            $tourist->save();
        }
        return view('tourists.profile', array('tourist' => Auth::user()));
    }

    public function create_message($id)
    {
        $guide = Guide::find($id);

        $tourist = Auth::user();

        return view('tourists.message-guide', compact('tourist', 'guide'));
    }

    // Return the view to contact a user
    public function create()
    {
        // $user = (Auth::guard('guide')) ? 'guide' : 'tourist';
        return view( 'tourists.message-guide');
    }

    // Store the user message details in the database
    public function store_message(Request $request, $guide_id)
    {
        // $user = (Auth::guard('guide')) ? 'guide' : 'tourist';
        $tourist = Auth::user();
        $tourist_id = $tourist->id;

        $this->validate(request(), [
            'description' => 'required|string|max:500',
            'message' => 'required|string|min:1',
        ]);

        // Create a new message instance for the user after a valid form submission
        ContactUser::create([
            'tourist_id' => $tourist_id,
            'guide_id' => $guide_id,
            'description' => $request['description'],
            'message' => $request['message'],
        ]);

        // Redirect the user to the dashboard after submitting a message
        return redirect(route( 'tourist.dashboard'));
    }
}
