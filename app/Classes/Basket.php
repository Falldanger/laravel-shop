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

//    protected function getPivotRow($product)
//    {
//        return $this->order->products()->where('product_id', $product->id)->first()->pivot;
//    }

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
        if ($this->order->products->contains($product->id)) {
            $pivotRow = $this->getPivotRow($product);
            if ($pivotRow->count < 2) {
                $this->order->products()->detach($product->id);
            } else {
                $pivotRow->count--;
                $pivotRow->update();
            }
        }

        Order::changeFullSum(-$product->price);
    }

    public function addProduct(Product $product)
    {
        if ($this->order->products->contains($product->id)) {
            $pivotRow = $this->getPivotRow($product);
            $pivotRow->count++;
            if ($pivotRow->count > $product->count) {
                return false;
            }
            $product->countInOrder++;
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
