<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActualitieImages extends Model
{
    public $timestamps = false;

    public function Actualitie(){

        return $this -> belongsTo('App\Actualitie', 'id', 'actualities_id');
    }
}
