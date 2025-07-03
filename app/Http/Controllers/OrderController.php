<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function payout(Request $request)
    {

        dd($request->all());
        // if ($request->paymentMethod === 'card') {
        // } else if ($request->paymentMethod === 'cod') {

        //     return view('order_fullfil');
        // }
    }
}
