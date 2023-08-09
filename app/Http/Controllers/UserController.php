<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function signup(Request $request) {
        $inputFields = $request->validate([
            'name'=> ['required', 'min:3'],
            'email'=>['required', 'email'],
            'password'=>['required', 'min:8']
        ]);
        $inputFields['password'] = bcrypt($inputFields['password']);
        User::create($inputFields);
        return 'Thank you for joining!, '. $request->name;
    }
}
