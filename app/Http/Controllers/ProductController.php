<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProdInsert;
use Illuminate\Support\Facades\DB;
use App\Order;
use App\OrderItem;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $id = $_GET['id'];
        $products = DB::table('product')->where('id', $id)->get();
        return view('single', compact('products'));
    }

    public function cart()
    {
        if ((Auth::check() && Auth::user()->name)== false) {
        return redirect()->action([BaseController::class, 'mainProduct']) ->withErrors([
            'message' => 'Musisz być zalogowany!'
        ]);
    }
        return view('cart');
    }

    public function addToCart($id)
    {

        if ((Auth::check() && Auth::user()->name)== false) {
            return redirect()->action([BaseController::class, 'mainProduct']) ->withErrors([
                'message' => 'Musisz być zalogowany!'
            ]);
        }

        $product = ProdInsert::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "id" => $product->id,
                "name" => $product->product_name,
                "quantity" => 1,
                "price" => $product->product_price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Pomyślnie dodano do koszyka!');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Zaktualizowano koszyk');
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Pomyślnie usunąłeś produkt z koszyka');
        }
    }

    public function checkout(Request $request)
    {
        $cart = session()->get('cart');

        $totalAmount = 0;

        foreach ($cart as $details) {
            $totalAmount += $details['price'] * $details['quantity'];
        }
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->amount = $totalAmount;
        $order->save();

        $data = [];

        foreach ($cart as $item) {
            $data['items'] = [
                [
                    'name' => $item['name'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]
            ];

        $orderItem = new OrderItem();
        $orderItem->order_id = $order->id;
        $orderItem->product_id = $item['id'];
        $orderItem->quantity = $item['quantity'];
        $orderItem->amount = $item['price'];
        $orderItem->save();

        }

        if ($orderItem->save()) {
            session()->forget('cart');
            return redirect()->to('/') ->withErrors([
                'message' => 'Pomyślnie złożono zamówienie!'
            ]);;
        }
    }
}
