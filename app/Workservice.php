<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workservice extends Model
{
    protected $fillable = ['day_ename', 'day_tname','opentime','closetime'];

    public function fitness(){

    	return $this->belongsToMany('App\Fitness','Workservices');
    }
}
