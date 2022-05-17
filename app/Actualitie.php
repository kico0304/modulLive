<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actualitie extends Model
{

    protected $dates = ['created_at'];

    protected $fillable = [
        'name','text',
    ];

    public function actualities_lang()
    {
        return $this->belongsToMany('App\Language','actualities_languages','actualities_id','language_id');
    }

    public function images()
    {
        return $this->hasMany('App\ActualitieImages', 'actualities_id', 'id');
    }

}
