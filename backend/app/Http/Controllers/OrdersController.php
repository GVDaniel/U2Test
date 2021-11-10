<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the orders.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $orders = Orders::all()->load('products.product.supplier');

        return response()->json( [
            'orders'    => $orders,
        ]);
    }

    /**
     * Display a listing of the orders by Date.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkdate(Request $request)
    {

        $date = Carbon::createFromFormat('Y-m-d', $request->date);

        $orders = Orders::whereDate('deadline', $date)->get();

        return response()->json( [
            'orders'    => $orders,
        ]);
    }
}
