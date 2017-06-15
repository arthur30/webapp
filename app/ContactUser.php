<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ContactUser extends Model
{
    // Return the view to contact a user
    public function create()
    {
        $user = (Auth::guard('guide')) ? 'guide' : 'tourist';
        return view($user . 's.message-' . $user);
    }

    // Store the user message details in the database
    public function store(Request $request)
    {
        $user = (Auth::guard('guide')) ? 'guide' : 'tourist';

        $this->validate(request(), [
            'tourist_id' => 'required',
            'guide_id' => 'required',
            'description' => 'required|string|max:500',
            'message' => 'required|string|min:1',
        ]);

        // Create a new message instance for the user after a valid form submission
        ContactUser::create([
            'tourist_id' => $request['tourist_id'],
            'guide_id' => $request['guide_id'],
            'description' => $request['description'],
            'message' => $request['message'],
        ]);

        // Redirect the user to the dashboard after submitting a message
        return redirect(route($user . '.dashboard'));
    }
}
