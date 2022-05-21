<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function loginView()
    {
        return view('login');
    }

    public function sessionStart()
    {
        if (auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'Email lub hasło są nieprawidłowe.'
            ]);
        }
        
        return redirect()->to('/');
    }

    public function sessionDestroy()
    {
        auth()->logout();
        
        return redirect()->to('/');
    }
}
