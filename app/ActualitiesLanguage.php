<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActualitiesLanguage extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'actualities_id','language_id',
    ];

}
