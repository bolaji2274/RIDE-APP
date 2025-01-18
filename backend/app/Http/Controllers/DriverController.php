<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DriverController extends Controller
{
    //
    public function show(Request $request) 
    {
        // return back the user driver model
        $user = $request->user();
        $user->load('driver');
        return $request->user()->driver;
    }

    public function update(Request $request) 
    {

    }
}
