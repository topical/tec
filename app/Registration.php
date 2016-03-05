<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $table = 'registration';
    
    protected $fillable = [
    		'pupil_id', 'circle_id'
    ];
    
    public function pupil()
    {
    	return $this->belongsTo('App\Pupil');
    }
    
    public function circle()
    {
    	return $this->belongsTo('App\Circle');
    }
    
}
