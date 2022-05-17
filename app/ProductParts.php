<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductParts extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'product_id','part_id',
    ];

}
