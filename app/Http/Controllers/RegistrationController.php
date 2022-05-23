<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{
    public function registrationView(){
        return view('registration');
    }

    public function create(Request $request){  
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'adress' => 'required',
            'phone' => 'required',
        ]);
        
        $user = User::create(request(['name', 'email', 'password', 'adress', 'phone']));
        
        auth()->login($user);
        
        $request->session()->regenerate();

        return redirect()->to('/');
    }

}
