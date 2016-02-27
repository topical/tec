<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
	protected $table = 'submission';
	
	public function pupil()
	{
		return $this->belongsTo('App\Pupil');
	}
	
	public function batch()
	{
		return $this->belongsTo('App\Batch');
	}
	
}
