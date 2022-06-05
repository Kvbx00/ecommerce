<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{
    public function registrationView()
    {
        return view('registration');
    }

    public function create(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|regex:"[A-Z]{1}[a-z]"|min:3|max:40',
            'email' => 'required|email|min:7|max:40|unique:users,Email',
            'password' => 'required|confirmed|min:6|max:40|regex:"^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$"',
            'adress' => 'required|regex:"[A-Z]{1}[a-z0-9]"',
            'phone' => 'required|regex:"^[0-9-+]{12,12}$"|unique:users,phone',
        ], [
            'name.required' => "Imię i nazwisko musi się zaczynać od dużej litery",
            'email.required' => "Wpisałeś nieprawidłowy email",
            'password.required' => "Hasło musi posiadać minimum 1 dużę literę, 1 małą literę, 
            1 znak specjalny, 1 cyfrę oraz minimum 8 znaków długości",
            'password.confirmed' => "Hasła się nie zgadzają",
            'adress.required' => "Miasto oraz ulica musi się zaczynać dużą literą",
            'phone.required' => "Nieprawidłowy numer telefonu format +48---------"
        ]);

        $user = User::create(request(['name', 'email', 'password', 'adress', 'phone']));

        auth()->login($user);

        $request->session()->regenerate();

        return redirect()->to('/');
    }
}
