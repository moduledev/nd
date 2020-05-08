<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Sluggable;

    public $timestamps = false;

    protected $fillable = [
        'code', 'slug', 'name_ru','name_ua'
    ];
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'code'
            ]
        ];
    }

    public function products()
    {
        return $this->belongsToMany('App\Product', 'product_category', 'category_id', 'product_id');
    }
}
