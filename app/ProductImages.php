<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    public $timestamps = false;

    public function product(){

        return $this -> belongsTo('App\Product', 'id', 'product_id');
    }
}
