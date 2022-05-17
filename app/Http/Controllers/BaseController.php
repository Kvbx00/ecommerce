<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BaseController extends Controller
{
    public function mainProduct(){
        $show = DB::table('product')->whereBetween('id', [8, 15])->get();
        return view('base', compact('show'));
    }

    public function shampoo(){
        $show = DB::table('product')->where('product_category', 'szampon')->get();
        return view('shampoo', compact('show'));
    }

    public function quick(){
        $show = DB::table('product')->where('product_category', 'quick')->get();
        return view('quick', compact('show'));
    }
}
