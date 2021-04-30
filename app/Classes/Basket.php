<?php

namespace App\Classes;

use App\Mail\OrderCreated;
use App\Models\Order;
use App\Models\Product;
use App\Services\CurrencyConversion;
use Illuminate\Support\Facades\Mail;

class Basket
{

    protected $order;

    public function __construct($createOrder = false)
    {
        $order = session('order');

        if (is_null($order) && $createOrder) {
            $data = [];
            if (auth()->check()) {
                $data['user_id'] = auth()->id();
            }
            $data['currency_id'] = CurrencyConversion::getCurrentCurrencyFromSession();

            $this->order = new Order($data);
            session(['order' => $this->order]);
        } else {
            $this->order = $order;
        }
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    public function saveOrder($name, $phone, $email)
    {
        if (!$this->countAvailable(true)) {
            return false;
        }
        Mail::to($email)->send(new OrderCreated($name, $this->getOrder()));
        return $this->order->saveOrder($name, $phone);
    }

    public function countAvailable($updateCount = false)
    {
        foreach ($this->order->products as $orderProduct) {
            if ($orderProduct->count < $this->getPivotRow($orderProduct)->count) {
                return false;
            }
            if ($updateCount) {
                $orderProduct->count -= $this->getPivotRow($orderProduct)->count;
            }
        }
        if ($updateCount) {
            $this->order->products->map->save();
        }
        return true;
    }

    public function removeProduct(Product $product)
    {
        if ($this->order->products->contains($product)) {
            $pivotRow = $this->order->products->where('id',$product->id)->first();
            if ($pivotRow->countInOrder < 2) {
                $this->order->products->pop($product);
            } else {
                $pivotRow->countInOrder--;
            }
        }
    }

    public function addProduct(Product $product)
    {
        if ($this->order->products->contains($product)) {
            $pivotRow = $this->order->products->where('id',$product->id)->first();
            if ($pivotRow->countInOrder >= $product->count) {
                return false;
            }
            $pivotRow->countInOrder++;
        } else {
            if ($product->count == 0) {
                return false;
            }
            $product->countInOrder = 1;
            $this->order->products->push($product);
        }
        return true;
    }
}
