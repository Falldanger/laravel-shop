<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

/**
 * Class OrderController
 * @package App\Http\Controllers\Admin
 */
class OrderController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $orders = Order::where('status', 1)->paginate(10);
        return view('auth.orders.index', compact('orders'));
    }

    /**
     * @param Order $order
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Order $order)
    {
        return view('auth.orders.show', compact('order'));
    }
}
