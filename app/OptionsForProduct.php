<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OptionsForProduct extends Model
{
    public $timestamps = false;

    public function option_images(){
        return $this->hasMany('App\OptionImages', 'option_id', 'id');
    }

    public function names(){
        return $this->hasMany('App\OptionNames', 'option_id', 'id');
    }

    public function texts(){
        return $this->hasMany('App\OptionTexts', 'option_id', 'id');
    }

    public function attributes(){
        return $this->hasMany('App\OptionAttributes', 'option_id', 'id');
    }

}
