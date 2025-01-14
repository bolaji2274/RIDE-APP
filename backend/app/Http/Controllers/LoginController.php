<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function submit(Request $request)
    {
        // validate phone number 
        $request->validate([
            // 'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            // 'password' => 'required'
           'phone' => 'required|numeric|min:10',
        ]);

        // find or create a user model
        $user = User::firstOrCreate([
            'phone' => $request->phone
        ]);

        if (!$user) {
            return response()->json([
                'message' => 'Could not process a user with that phone number.'
            ], 401);
        }
        // send a user one time code
        $user->notify(new LoginCodeNotification());
    }
}
