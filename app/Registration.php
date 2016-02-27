<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $table = 'registration';
    
    public function pupil()
    {
    	return $this->belongsTo('App\Pupil');
    }
    
    public function circle()
    {
    	return $this->belongsTo('App\Circle');
    }
    
}
