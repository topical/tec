<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pupil extends Model
{
    protected $table = 'pupil';
    
    public function school()
    {
    	return $this->belongsTo('App\School');
    }
    
    public function circle()
    {
    	return $this->belongsToMany('App\Circle', 'registration');
    }
    
    public function registration()
    {
    	return $this->hasMany('App\Registration');
    }
    
    public function submission()
    {
    	return $this->hasMany('App\Submission');
    }
    
    public function batch()
    {
    	return $this->belongsToMany('App\Batch', 'submission');
    }  
}
