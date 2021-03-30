<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function basket()
    {
        $orderId = session('orderId');

        $order = Order::findOrFail($orderId);

        return view('basket', compact('order'));
    }

    public function basketPlace()
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('index');
        }
        $order = Order::find($orderId);
        return view('order', compact('order'));
    }

    public function basketConfirm()
    {

    }

    public function basketAdd($productId)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            $order = Order::create();
            session(['orderId' => $order->id]);
        } else {
            $order = Order::find($orderId);
        }

        if ($order->products->contains($productId)) {
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            $pivotRow->count++;
            $pivotRow->update();
        } else {
            $order->products()->attach($productId);
        }
        return redirect()->route('basket');
    }

    public function basketRemove($productId)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('basket');
        }

        $order = Order::find($orderId);

        if ($order->products->contains($productId)) {
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            if ($pivotRow->count < 2) {
                $order->products()->detach($productId);
            } else {
                $pivotRow->count--;
                $pivotRow->update();
            }
        } else {
            $order->products()->detach($productId);
        }
        return redirect()->route('basket');
    }
}
