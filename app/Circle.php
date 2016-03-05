<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Circle extends Model
{
    protected $table = 'circle';
    
    protected $fillable = [
    		'subject_id', 'grade', 'year',
    ];
    
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
    
    public function pupils()
    {
    	return $this->belongsToMany('App\Pupil', 'registration');
    }
    
    public function submission()
    {
    	return $this->hasManyThrough('App\Submission', 'batch');
    }
}
