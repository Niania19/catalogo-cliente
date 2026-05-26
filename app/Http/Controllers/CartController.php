<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
        private $api = 'https://apihotel21-production.up.railway.app/api/productos';

  public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function add(Request $request)
    {
        $cart = session()->get('cart', []);

        $id = $request->id;

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "nombre" => $request->nombre,
                "precio" => $request->precio,
                "imagen" => $request->imagen,
                "quantity" => 1
            ];
        }

        session()->put('cart', $cart);
        return back()->with('success', 'Producto agregado al carrito');
    }

    public function update(Request $request)
    {
        $cart = session()->get('cart');
        $cart[$request->id]["quantity"] = $request->quantity;
        session()->put('cart', $cart);

        return back();
    }

    public function remove(Request $request)
    {
        $cart = session()->get('cart');

        unset($cart[$request->id]);

        session()->put('cart', $cart);

        return back();
    }

    public function clear()
    {
        session()->forget('cart');
        return back();
    }

}
