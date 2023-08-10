<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function registerPet(Request $request) {
        $inputFields = $request-> validate([
            'name' => 'required',
            'breed' => 'required',
            'age' => 'required'
        ]);
        $inputFields['user_id'] = auth()->id();
        Pet::create($inputFields);
        return redirect('/');
    }
}
