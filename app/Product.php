<?php

namespace App;

use App\ProductAttribute;
use Astrotomic\Translatable\Translatable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Sluggable, Translatable;

    public $translatedAttributes = ['name','description'];
    public $timestamps = false;

    protected $fillable = [
        'base_name','slug','available'
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
                'source' => 'base_name'
            ]
        ];
    }


    /**
     * @return array|\Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function attributesToArray()
    {
        return $this->belongsToMany('App\Attribute','product_attribute', 'attribute_id','product_id');
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'product_attributes');
    }
}
