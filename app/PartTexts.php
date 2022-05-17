<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartTexts extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'text','language','part_id',
    ];

    public function part(){

        return $this -> belongsTo('App\PartsForProduct', 'id', 'part_id');
    }
}
