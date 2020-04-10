<?php

namespace App;

use App\ProductAttribute;
use Astrotomic\Translatable\Translatable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Sluggable, Translatable;

    public $translatedAttributes = ['name'];
    public $timestamps = false;

    protected $fillable = [
        'name'
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
                'source' => 'name'
            ]
        ];
    }


    /**
     * @return array|\Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function attributesToArray()
    {
        return $this->belongsToMany('App\Attribute');
    }

    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }
}
