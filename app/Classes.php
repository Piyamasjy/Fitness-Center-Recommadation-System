<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table = "class";
    protected $fillable = ['class_ename', 'class_tname','description','image','type_id'];

    // public function type()
    // {

    // 	return $this->hasOne('App\Typesport','Typesports');
    // }

    // public function fitness()
    // {
    // 	return $this->belongsToMany('App\Fitness');
    // }
}
