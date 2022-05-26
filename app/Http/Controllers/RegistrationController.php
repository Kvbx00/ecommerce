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
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'adress' => 'required',
            'phone' => 'required',
        ], [
            'name.required' => "Wpisałeś błędne imię i nazwisko",
            'email.required' => "Wpisałeś nieprawidłowy email",
            'password.required' => "Wpisałeś nieprawidłowe hasło",
            'adress.required' => "Wpisałeś nieprawidłowy adres",
            'phone.required' => "Wpisałeś nieprawidłowy numer telefonu"
        ]);

        $user = User::create(request(['name', 'email', 'password', 'adress', 'phone']));

        auth()->login($user);

        $request->session()->regenerate();

        return redirect()->to('/');
    }
}
