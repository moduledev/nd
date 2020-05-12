<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    /**
     * @var string
     */
    protected $table = 'attribute_values';

    protected $fillable = [
        'attribute_id', 'value_ua', 'value_ru', 'price'
    ];

    /**
     * @var array
     */
    protected $casts = [
        'attribute_id' => 'integer',
    ];

    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function attribute()
    {
        return $this->belongsTo('App\Attribute');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function productAttributes()
    {
        return $this->belongsToMany('App\ProductAttribute');
    }
}
