<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function loginView()
    {
        return view('login');
    }

    public function sessionStart(Request $request)
    {
        if (auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'Email lub hasło są nieprawidłowe.'
            ]);
        }
        
        $request->session()->regenerate();

        return redirect()->to('/');
    }

    public function sessionDestroy(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->to('/');
    }
}
