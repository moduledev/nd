<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    /**
     * @var string
     */
    protected $table = 'attribute';

    protected $appends = ['name'];

    public $timestamps = false;

    protected $fillable = [
        'code', 'name_ua', 'name_ru', 'is_filterable', 'is_required'
    ];

    public function getNameAttribute()
    {
        return app()->getLocale() === 'ua' ? $this->name_ua : $this->name_ru;
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function values()
    {
        return $this->hasMany('App\AttributeValue');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_attributes');
    }
}
