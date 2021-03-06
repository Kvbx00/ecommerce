<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\ProdInsert;
use App\UserInsert;

class AdminController extends Controller
{
    public function admin()
    {
        if ((Auth::check() && Auth::user()->role == "1") == false) {
            return redirect()->action([BaseController::class, 'mainProduct']);
        }
        return view('admin');
    }

    ///Dodwanie produktów

    public function ProdInsert()
    {
        if ((Auth::check() && Auth::user()->role == "1") == false) {
            return redirect()->action([BaseController::class, 'mainProduct']);
        }
        return view('admin_product_add');
    }

    public function product_create()
    {
        $this->validate(request(), [
            'product_name' => 'required',
            'product_brand' => 'required',
            'product_price' => 'required',
            'product_description' => 'required',
            'product_availability' => 'required',
            'product_category' => 'required',
            'image' => 'required',
        ], [
            'product_name.required' => "Niepoprawna nazwa",
            'product_brand.required' => "Niepoprawny producent",
            'product_price.required' => "Niepoprawna cena",
            'product_description.required' => "Niepoprawny opis",
            'product_availability.required' => "Niepoprawna ilość",
            'product_category.required' => "Niepoprawna kategoria",
            'image.required' => "Niepoprawna ścieżka do zdjęcia"
        ]);

        ProdInsert::create(request([
            'product_name', 'product_brand', 'product_price', 'product_description',
            'product_availability', 'product_category', 'image'
        ]));

        return redirect()->to('admin_product_add');
    }

    ///Usuwanie produktów

    public function select_product()
    {
        $products = DB::select('select * from product');
        if ((Auth::check() && Auth::user()->role == "1") == false) {
            return redirect()->action([BaseController::class, 'mainProduct']);
        }
        return view('admin_product_delete', ['products' => $products]);
    }
    public function destroy_product($id)
    {
        DB::delete('delete from product where id = ?', [$id]);
        return redirect()->to('admin_product_delete');
    }

    ///Edycja produktów

    public function ProdEdit()
    {
        $products = ProdInsert::all();
        if ((Auth::check() && Auth::user()->role == "1") == false) {
            return redirect()->action([BaseController::class, 'mainProduct']);
        }
        return view('admin_product_edit', compact('products'));
    }

    public function product_edit($id)
    {
        $products = ProdInsert::find($id);
        if ((Auth::check() && Auth::user()->role == "1") == false) {
            return redirect()->action([BaseController::class, 'mainProduct']);
        }
        return view('product_edit', compact('products'));
    }

    public function product_update(Request $request, $id)
    {
        $products = ProdInsert::find($id);
        $products->product_name = $request->input('product_name');
        $products->product_brand = $request->input('product_brand');
        $products->product_price = $request->input('product_price');
        $products->product_description = $request->input('product_description');
        $products->product_availability = $request->input('product_availability');
        $products->product_category = $request->input('product_category');
        $products->image = $request->input('image');
        $products->update();
        return redirect()->to('admin_product_edit');
    }

    ///Dodawanie uzytkownikow

    public function UserInsert()
    {
        if ((Auth::check() && Auth::user()->role == "1") == false) {
            return redirect()->action([BaseController::class, 'mainProduct']);
        }
        return view('admin_user_add');
    }

    public function user_create()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'adress' => 'required',
            'phone' => 'required',
            'role',
        ], [
            'name.required' => "Wpisałeś błędne imię i nazwisko",
            'email.required' => "Wpisałeś nieprawidłowy email",
            'password.required' => "Wpisałeś nieprawidłowe hasło",
            'adress.required' => "Wpisałeś nieprawidłowy adres",
            'phone.required' => "Wpisałeś nieprawidłowy numer telefonu",
            'role' => "Wpisałeś błędną rolę",
        ]);

        UserInsert::create(request([
            'name', 'email', 'password', 'adress',
            'phone', 'role'
        ]));

        return redirect()->to('admin_user_add');
    }

    ///Usuwanie użytkowników

    public function select_user()
    {
        $users = DB::select('select * from users');
        if ((Auth::check() && Auth::user()->role == "1") == false) {
            return redirect()->action([BaseController::class, 'mainProduct']);
        }
        return view('admin_user_delete', ['users' => $users]);
    }
    public function destroy_user($id)
    {
        DB::delete('delete from users where id = ?', [$id]);
        return redirect()->to('admin_user_delete');
    }

        ///Edycja produktów

        public function UserEdit()
        {
            $users = UserInsert::all();
            if ((Auth::check() && Auth::user()->role == "1") == false) {
                return redirect()->action([BaseController::class, 'mainProduct']);
            }
            return view('admin_user_edit', compact('users'));
        }
    
        public function user_edit($id)
        {
            $users = UserInsert::find($id);
            if ((Auth::check() && Auth::user()->role == "1") == false) {
                return redirect()->action([BaseController::class, 'mainProduct']);
            }
            return view('user_edit', compact('users'));
        }
    
        public function user_update(Request $request, $id)
        {
            $users = UserInsert::find($id);
            $users->name = $request->input('name');
            $users->email = $request->input('email');
            $users->password = $request->input('password');
            $users->created_at = $request->input('created_at');
            $users->updated_at = $request->input('updated_at');
            $users->adress = $request->input('adress');
            $users->phone = $request->input('phone');
            $users->role = $request->input('role');
            $users->update();
            return redirect()->to('admin_user_edit');
        }

}
