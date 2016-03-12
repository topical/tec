<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
	protected $table = 'submission';
	
	protected $fillable = [
			'score', 'pupil_id', 'batch_id'
	];
	
	public function pupil()
	{
		return $this->belongsTo('App\Pupil');
	}
	
	public function batch()
	{
		return $this->belongsTo('App\Batch');
	}
	
}
