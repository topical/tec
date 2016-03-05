<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected $table = 'batch';
    
    protected $fillable = [
    		'circle_id', 'seqno', 'maxscore'
    ];
    
    public function circle()
    {
    	return $this->belongsTo('App\Circle');
    }
    
    public function submissions()
    {
    	return $this->hasMany('App\Submission');
    }
}
