<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = ['email', 'product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function scopeActiveByProductId($query, $productId)
    {
        return $query->where('active', 0)->where('product_id', $productId);
    }

    public static function sendEmailBySubscription(Product $product)
    {
        $subscriptions = self::activeByProductId($product->id)->get();
        foreach ($subscriptions as $subscription){

        }
    }
}
