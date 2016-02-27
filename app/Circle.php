<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Circle extends Model
{
    protected $table = 'circle';
    
    public function subject()
    {
    	return $this->belongsTo('App\Subject');
    }
    
    public function registration()
    {
    	return $this->hasMany('App\Registration');
    }
    
    public function batch()
    {
    	return $this->hasMany('App\Batch');
    }
    
    public function pupil()
    {
    	return $this->belongsToMany('App\Pupil', 'registration');
    }
    
    public function submission()
    {
    	return $this->hasManyThrough('App\Submission', 'batch');
    }
}
