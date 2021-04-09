<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * @package App
 */
class Product extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = ['name', 'code', 'price', 'category_id', 'description', 'image', 'new', 'hit', 'recommend'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return float|int|mixed
     */
    public function getPriceForCount()
    {
        if (!is_null($this->pivot)) {
            return $this->pivot->count * $this->price;
        }
        return $this->price;
    }

    /**
     * @return bool
     */
    public function isHit()
    {
        return $this->hit === 1;
    }

    /**
     * @return bool
     */
    public function isNew()
    {
        return $this->new === 1;
    }

    /**
     * @return bool
     */
    public function isRecommend()
    {
        return $this->recommend === 1;
    }
}
