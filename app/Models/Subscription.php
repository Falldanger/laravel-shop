<?php

namespace App\Models;

use App\Mail\SendSubscriptionMessage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Subscription extends Model
{
    protected $fillable = ['email', 'product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function scopeActiveByProductId($query, $productId)
    {
        return $query->where('status', 0)->where('product_id', $productId);
    }

    public static function sendEmailBySubscription(Product $product)
    {
        $subscriptions = self::activeByProductId($product->id)->get();
        foreach ($subscriptions as $subscription) {
            Mail::to($subscription->email)->send(new SendSubscriptionMessage($product));
            $subscription->status = 1;
            $subscription->save();
        }
    }
}
