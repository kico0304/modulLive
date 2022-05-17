<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSurface extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'surface','language','product_id',
    ];

    public function product(){

        return $this -> belongsTo('App\Product', 'id', 'product_id');
    }
}
