<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use App\Http\Requests\PetRegisterFormRequest;

class PetController extends Controller
{   
    public function displayPets() {
        $pets = Pet::all();
        return view('pets', ['pets' => $pets] );
}
    public function registerPet(PetRegisterFormRequest $request) {
        $inputFields = $request->validated();
        $inputFields['user_id'] = auth()->id();
        Pet::create($inputFields);
        return back()->withInput();
    }
}
