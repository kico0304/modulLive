<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OptionImages extends Model
{
    public $timestamps = false;

    public function option(){

        return $this -> belongsTo('App\OptionsForProduct', 'id', 'option_id');
    }
}
