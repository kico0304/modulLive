<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OptionNames extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name','language','option_id',
    ];

    public function option(){

        return $this -> belongsTo('App\OptionsForProduct', 'id', 'option_id');
    }
}
