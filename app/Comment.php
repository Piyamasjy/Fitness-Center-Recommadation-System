<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comments";
    protected $fillable = ['text', 'rating','fitness_id','user_id'];

    public function fitness()
    {

    	return $this->hasOne('App\Fitness','Fitness');
    }

    public function user()
    {

    	return $this->hasOne('App\User','Members');
    }
}
