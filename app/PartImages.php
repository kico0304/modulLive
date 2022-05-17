<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartImages extends Model
{
    public $timestamps = false;

    public function part(){

        return $this -> belongsTo('App\PartsForProduct', 'id', 'part_id');
    }
}
