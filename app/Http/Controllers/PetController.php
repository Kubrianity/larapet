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
        $user = auth()->user();
        $inputFields['user_id'] = $user->id;
        $createdPet = Pet::create($inputFields);
        $user->registered_pets = $createdPet;
        $createdPet->save();
        $user->save();
        return back()->withInput();
    }
}
