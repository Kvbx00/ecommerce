<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BaseController extends Controller
{
    public function mainProduct(){
        $show=DB::table('product')->whereBetween('id', [8, 15])->get();
        return view('base', compact('show'));
        }
        
}
