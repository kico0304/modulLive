<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{

    public $timestamps = false;

    public function actualities(){
        return $this->belongsToMany('App\Actualitie','actualities_languages','language_id','actualities_id');
    }

}
