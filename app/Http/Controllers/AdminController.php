<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BaseController;

class AdminController extends Controller{
    public function admin(){
        if((Auth::check() && Auth::user()->role == "1")==false){
            return redirect()->action([BaseController::class, 'mainProduct']);
        }
        return view('admin');
    }

}
