<?php

namespace App\Http\Controllers;

use App\Guide;

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
}
