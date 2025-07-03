<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Products\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function payout(Request $request)
    {


        $product =  ($request->product);

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
        $orderItem->save();

        foreach ($product as $key => $value) {
            $orderItem->products()->attach([
                $key => ['quantity' => $value],
            ]);
            $product = Product::find($key);
            $product->quantity -=  $value;
            $product->save();
        }

        // empty the cart
        $cart = session('cart', []);
        $cart = [];
        session()->put('cart', $cart);

        if ($request->paymentMethod === 'card') {
        } else if ($request->paymentMethod === 'cod') {

            return view('order_fullfil', ['id' => $order->id]);
        }
    }

    public function list()
    {
        $id = Auth::user()->id;
        $orders =  Order::where('user_id', $id)->with('order_item.products')->get();
        return view('orders', ['order_item' => $orders,]);
    }
    public function singleOrder($id)
    {
        return Order::with('order_item.products')->find($id);
    }
}
