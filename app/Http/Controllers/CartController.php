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
            $cart[$request->id]['product_quantity'] -= 1;
        }


        session()->put('cart', $cart);

        return response()->json([
            'id' => $request->id,
            'cart' => $cart,

        ]);
    }
}
