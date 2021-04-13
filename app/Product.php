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
    protected $fillable = ['name', 'code', 'price', 'category_id', 'description', 'image', 'hit', 'new', 'recommend'];

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
     * @param $value
     */
    public function setNewAttribute($value)
    {
        $this->attributes['new'] = $value === 'on' ? 1 : 0;
    }

    /**
     * @param $value
     */
    public function setHitAttribute($value)
    {
        $this->attributes['hit'] = $value === 'on' ? 1 : 0;
    }

    /**
     * @param $value
     */
    public function setRecommendAttribute($value)
    {
        $this->attributes['recommend'] = $value === 'on' ? 1 : 0;
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

    public function scopeHit($query)
    {
        return $query->where('hit', 1);
    }

    public function scopeNew($query)
    {
        return $query->where('new', 1);
    }

    public function scopeRecommend($query)
    {
        return $query->where('recommend', 1);
    }
}
