<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductNames extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name','language','product_id',
    ];

    public function product(){

        return $this -> belongsTo('App\Product', 'id', 'product_id');
    }
}
