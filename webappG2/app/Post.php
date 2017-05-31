<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Constructor for post which specifies that the user must be logged in to post
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    // Return the view to create a post
    public function create()
    {
        return view('posts.create');
    }

    // Store the post details in the database
    public function store()
    {
        $this->validate(request(), [
            'title' => 'required',
            'start_time' => 'required',
            'country' => 'required',
            'city' => 'required',
            'location' => 'required',
            'tourist_name' => 'required',
            'guide_name' => 'required',
        ]);

        Post::create([
            'tourist_id'=> auth()->id(),
            'title' => request('title'),
            'start_time' => request('start_time'),
            'country' => request('country'),
            'city' => request('city'),
            'location' => request('location'),
            'tourist_name' => auth()->id()->name()
        ]);

        return redirect('/');
    }

    // Display all posts
    public function index()
    {
        $posts = Post::latest()->get();

        return view('posts.index', compact('posts'));
    }

    // Display a specific post
    public function show(Post $post)
    {
        return view('posts.show', compact($post));
    }

    public static function not_finished()
    {
        return static::where('finished', 0)->get();
    }

    public static function finished()
    {
        return static::where('finished', 1)->get();
    }
}
