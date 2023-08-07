<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function signup(Request $request) {
        $fieldInputs = $request->validate([
            'name'=> ['required', 'min:3'],
            'email'=>['required', 'email'],
            'password'=>['required', 'min:8']
        ]);
        return 'Hello '. $request->name;
    }
}
