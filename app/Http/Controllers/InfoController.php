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


    public function display_guide_per_id()
    {
        return view('guides.guide-description-page');
    }

    public function get_guide_per_id(Request $request)
    {
        $id = 6;
        $guide = Guide::where('id', $id)->get();
        return redirect(route('guides.guide.page.get', 'id'), compact('guide'));
    }


    public function get_guides_city($city)
    {
        $guides = Guide::where('home_town', $city)->get();
        $data = json_decode( $guides );

        return view('guides.guides-page', compact('guides', 'city'));
    }

    public function location_submit(Request $request)
    {
        $city = $request["where"];
        return redirect(route('guides.city', $city));
    }

    public function availability()
    {
        return view('availability');
    }
}
