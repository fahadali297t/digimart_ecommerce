<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    public function list()
    {
        $order = new Order();

        $orders =  $order->with('order_item.products')->get();
        return view('Admin.pages.orders', ['orders' => $orders]);
    }
    public function update($id)
    {
        $order = new Order();
        $order_item =  $order::with('order_item.products')->find($id);
        return view('Admin.pages.orders_update', ['order' => $order_item]);
    }
    public function update_store(Request $request)
    {

        $id = $request->id;
        $val  = $request->val;

        if ($val === "payment") {
            $order = Order::findorfail($id);
            $order->payable_status = true;
            $order->save();

            return response()->json([
                'success' => true,
                'data' => $order->payable_status,
            ]);
        } else {
            $order = Order::findorfail($id);
            $order->shipment_status = "Shipped";
            $order->save();

            return response()->json([
                'success' => true,
                'data' => $order->shipment_status,
            ]);
        }
    }

    public function paid_list()
    {
        $order = new Order();

        $orders =  $order->where('payable_status', 1)->with('order_item.products')->get();
        return view('Admin.pages.orders', ['orders' => $orders]);
    }
    public function unpaid_list()
    {
        $order = new Order();

        $orders =  $order->where('payable_status', 0)->with('order_item.products')->get();
        return view('Admin.pages.orders', ['orders' => $orders]);
    }

    public function shipped_list()
    {
        $order = new Order();

        $orders =  $order->where('shipment_status', 'shipped')->with('order_item.products')->get();
        return view('Admin.pages.orders', ['orders' => $orders]);
    }
    public function cancelled_list()
    {
        $order = new Order();

        $orders =  $order->where('shipment_status', 'cancelled')->with('order_item.products')->get();
        return view('Admin.pages.orders', ['orders' => $orders]);
    }
}
