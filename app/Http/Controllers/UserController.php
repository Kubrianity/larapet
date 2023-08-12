<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Requests\UserRegisterFormRequest;
use App\Http\Requests\UserLoginFormRequest;

class UserController extends Controller
{
    public function signup(UserRegisterFormRequest $request) {
        $inputFields = $request-> validated();
        $inputFields['password'] = bcrypt($inputFields['password']);
        $user = User::create($inputFields);
        auth()-> login($user);
        return redirect('/profile');
    }
    public function login(UserLoginFormRequest $request) {
        $inputFields = $request-> validated();
        if (auth()-> attempt([
            'name' => $inputFields['login_name'], 
            'password' => $inputFields['login_password']
        ])
        ){
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
            return view('profile', ['username' => $username, 'pets' => $pets]);
        }
        else {
            return redirect('/');
        }
    }
}
