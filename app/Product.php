<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public $timestamps = false;

    public function images()
    {
        return $this->hasMany('App\ProductImages', 'product_id', 'id');
    }

    public function product_parts()
    {
        return $this->belongsToMany('App\PartsForProduct', 'product_parts', 'product_id', 'part_id');
    }

    public function names()
    {
        return $this->hasMany('App\ProductNames', 'product_id', 'id');
    }

    public function texts()
    {
        return $this->hasMany('App\ProductTexts', 'product_id', 'id');
    }

    public function surface_text()
    {
        return $this->hasMany('App\ProductSurface', 'product_id', 'id');
    }
}
