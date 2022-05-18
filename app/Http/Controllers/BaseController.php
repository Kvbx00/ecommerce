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

    public function brush(){
        $show = DB::table('product')->where('product_category', 'szczotka')->get();
        return view('brush', compact('show'));
    }

    public function foam(){
        $show = DB::table('product')->where('product_category', 'piana')->get();
        return view('foam', compact('show'));
    }

    public function microfibre(){
        $show = DB::table('product')->where('product_category', 'mikrofibra')->get();
        return view('microfibre', compact('show'));
    }

    public function sponge(){
        $show = DB::table('product')->where('product_category', 'gabka')->get();
        return view('sponge', compact('show'));
    }

    public function wax(){
        $show = DB::table('product')->where('product_category', 'wosk')->get();
        return view('wax', compact('show'));
    }

    public function single(){
        $id = $_GET['id'];
        $show = DB::table('product')->where('id', $id)->get();
        return view('single', compact('show'));
    }
}
