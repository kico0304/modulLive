<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductTexts extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'text','language','product_id',
    ];

    public function product(){

        return $this -> belongsTo('App\Product', 'id', 'product_id');
    }
}
