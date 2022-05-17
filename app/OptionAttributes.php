<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OptionAttributes extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'attributes','language','option_id',
    ];

    public function option(){

        return $this -> belongsTo('App\OptionsForProduct', 'id', 'option_id');
    }
}
