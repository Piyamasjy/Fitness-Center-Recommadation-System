<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fitness extends Model
{
	protected $table ="fitness";
    protected $fillable = ['fitness_ename', 'fitness_tname','address','website',
    					'contact_number','lat','lng','image'];

   	public function typesports()
   	{

    	return $this->belongsToMany('App\Typesport','Fitness_typesports')->withTimestamps();
    }

    public function workservices()
    {

    	return $this->belongsToMany('App\Workservice','Fitness_workservices')->withTimestamps();
    }

    public function classes()
    {
        //  'Classes_fitness' คือ ชื่อตาราง
    	return $this->belongsToMany('App\Classes','Fitness_class')->withTimestamps();
    }
    
}
