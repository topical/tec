<?php

namespace App;

use Session;

class SessionData
{
	static public function getYear()
	{
		return Session::get('year', function() {
			$time = localtime();
			if( $time[4] >= 8)
				return 1900 + $time[5];
			else 
				return 1900 + $time[5] - 1;
		});
	}
	
	static public function setYear( $year )
	{
		Session::set('year', $year);
	}
}