<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factor extends Model
{
    protected $table = "factors";
    protected $fillable = ['fac_ename', 'fac_tname','fac_score','user_id'];

    public function user()
    {

    	return $this->hasOne('App\User','Members');
    }
    
}
