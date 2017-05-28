<?php

namespace App\Http\Controllers;

use App\Guide;

class GuidesController extends Controller
{
    public function index()
    {
        $guides = Guide::all();

        return view('guides.welcome', compact('guides'));
    }

    public function show($id) // If you pass Guide $guide then it will do Guide::find(wildcard)
    {
        $guide = Guide::find($id);

        return view('guides.show', compact('guide'));
    }
}
