<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function payout(Request $request)
    {


        $product =  (json_encode($request->product));

        $order = new Order();
        $order->user_id = $request->user_id;
        $order->name = $request->name;
        $order->email = $request->email;
        $order->address = $request->address;
        $order->city = $request->city;
        $order->postal_code = $request->zip;
        $order->payment_method = $request->paymentMethod;
        $order->total_amount = $request->total;
        $order->save();

        $orderItem = new OrderItem();
        $orderItem->order_id = $order->id;
        $orderItem->products = $product;
        $orderItem->save();

        // empty the cart
        $cart = session('cart', []);
        $cart = [];
        session()->put('cart', $cart);

        if ($request->paymentMethod === 'card') {
        } else if ($request->paymentMethod === 'cod') {
            return view('order_fullfil', ['id' => $order->id]);
        }
    }
}
