<?php

namespace App\Http\Controllers;

use App\Mail\OrderConfirmation;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Products\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function payout(Request $request)
    {

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'city' => 'required',
            'zip' => 'required',
            'paymentMethod' => 'required',
            'total' => 'required',
        ]);

        if ($data) {


            if ($request->paymentMethod === 'card') {
                $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
                $charge = $stripe->charges->create([
                    'amount' => intval($request->total) * 100,
                    'currency' => 'pkr',
                    'source' => $request->stripe_token,
                ]);
                if ($charge) {
                    $product =  ($request->product);

                    $order = new Order();
                    $order->user_id = $request->user_id;
                    $order->name = $request->name;
                    $order->email = $request->email;
                    $order->address = $request->address;
                    $order->city = $request->city;
                    $order->postal_code = $request->zip;
                    $order->payment_method = $request->paymentMethod;
                    $order->payable_status = true;
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
                    $to = $request->email;
                    $msg = "<p>Thank you for your order!</p>
                        <p>Your order ID is <strong>{$order->id}</strong></p>
                        <p>Total:{$request->total}/-</p>";

                    $sub = 'Order Confirmed';

                    Mail::to($to)->queue(new OrderConfirmation($msg, $sub));

                    return view('order_fullfil', ['id' => $order->id]);
                } else {
                    abort(402);
                }
            } else if ($request->paymentMethod === 'cod') {
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
                $to = $request->email;
                $msg = "<p>Thank you for your order!</p>
                        <p>Your order ID is <strong>{$order->id}</strong></p>
                        <p>Total:{$request->total}/-</p>";

                $sub = 'Order Confirmed';

                Mail::to($to)->queue(new OrderConfirmation($msg, $sub));

                return view('order_fullfil', ['id' => $order->id]);
            }
        } else {
            return redirect()->route('cart.checkout');
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
