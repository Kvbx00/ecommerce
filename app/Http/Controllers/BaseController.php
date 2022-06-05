<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BaseController extends Controller
{
    public function mainProduct()
    {
        $show = DB::table('product')->orderBy('id', 'desc')->take(8)->get();
        return view('base', compact('show'));
    }

    public function shampoo()
    {
        $show = DB::table('product')->where('product_category', 'szampon')->paginate(8);
        return view('shampoo', compact('show'));
    }

    public function quick()
    {
        $show = DB::table('product')->where('product_category', 'quick')->paginate(8);
        return view('quick', compact('show'));
    }

    public function brush()
    {
        $show = DB::table('product')->where('product_category', 'szczotka')->paginate(8);
        return view('brush', compact('show'));
    }

    public function foam()
    {
        $show = DB::table('product')->where('product_category', 'piana')->paginate(8);
        return view('foam', compact('show'));
    }

    public function microfibre()
    {
        $show = DB::table('product')->where('product_category', 'mikrofibra')->paginate(8);
        return view('microfibre', compact('show'));
    }

    public function sponge()
    {
        $show = DB::table('product')->where('product_category', 'gabka')->paginate(8);
        return view('sponge', compact('show'));
    }

    public function wax()
    {
        $show = DB::table('product')->where('product_category', 'wosk')->paginate(8);
        return view('wax', compact('show'));
    }

    public function single()
    {
        $id = $_GET['id'];
        $show = DB::table('product')->where('id', $id)->get();
        return view('single', compact('show'));
    }
}
