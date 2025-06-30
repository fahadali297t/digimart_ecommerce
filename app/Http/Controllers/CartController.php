<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function Pest\Laravel\put;

class CartController extends Controller
{

    public function quantity_update(Request $request)
    {
        $cart = session('cart', []);

        if ($request->inc) {
            $cart[$request->id]['product_quantity'] += 1;
        } else {
            if ($cart[$request->id]['product_quantity'] > 1) {
                # code...
                $cart[$request->id]['product_quantity'] -= 1;
            }
        }


        session()->put('cart', $cart);

        return response()->json([
            'id' => $request->id,
            'cart' => $cart,

        ]);
    }

    // checkout 

    public function checkout(Request $request)
    {
        $cart = session('cart', []);
        // dd($request->all());
        // dd($cart);
        if (!$request->total) {
            abort(404);
        }
        return view('checkout', ['total' => $request->total, 'cart', $cart]);
    }
}
