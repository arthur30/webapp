<?php

namespace App\Http\Controllers;

use App\Guide;
use Illuminate\Http\Request;

class InfoController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function about()
    {
        return view('about');
    }

    public function location_submit(Request $request)
    {
        $city = $request["where"];
        return redirect(route('guides.city', $city));
    }

    public function get_guides_city($city)
    {
        $guides = Guide::where('home_town', $city)->get();
        $data = json_decode( $guides );

        return view('guides.guides-page', compact('guides', 'city'));
    }

    public function display_guide_per_id($id)
    {
        $guide = Guide::find($id);

        return view('guides.guide-personal-page', compact('guide'));
    }

    public function availability()
    {
        return view('availability');
    }
}