<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OptionTexts extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'text','language','option_id',
    ];

    public function option(){

        return $this -> belongsTo('App\OptionsForProduct', 'id', 'option_id');
    }
}
