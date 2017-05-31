<?php

namespace App\Http\Controllers;

use App\Tourist;

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
}
