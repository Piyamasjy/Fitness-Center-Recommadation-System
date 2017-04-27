<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typesport extends Model
{
    protected $fillable = ['type_ename', 'type_tname'];

    public function fitness(){

    	return $this->belongsToMany('App\Fitness');
    }

}
