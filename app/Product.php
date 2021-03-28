<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'code'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
