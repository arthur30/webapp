<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuidesChatController extends Controller
{
    /**
     * Return the chat view from dashboard
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function chat()
    {
        return view('chat');
    }
}
