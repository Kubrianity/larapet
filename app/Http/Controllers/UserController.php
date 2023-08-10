<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function signup(Request $request) {
        $inputFields = $request-> validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8']
        ]);
        $inputFields['password'] = bcrypt($inputFields['password']);
        $user = User::create($inputFields);
        auth()-> login($user);
        return redirect('/profile');
    }
    public function login(Request $request) {
        $inputFields = $request-> validate([ 
            'login_name' => 'required',
            'login_password' => 'required'
        ]);
        if (auth()-> attempt([
            'name' => $inputFields['login_name'], 
            'password' => $inputFields['login_password']
        ])
            ) {
            $request-> session()-> regenerate();
            return redirect('/profile');
        }
        else {
            return redirect('/');
        }
    }
    public function logout() {
        auth()-> logout();
        return redirect('/');
    }
    public function profile() {
        if (auth()-> check()) {
            $pets = [];
            $username = auth()-> user()-> name;
            $pets = auth()-> user()-> userPets()-> latest()-> get();
            return view('profile', ['username' => 'username', 'pets' => $pets]);
        }
        else {
            return redirect('/');
        }
    }
}
