<?php

use LaravelBook\Ardent\Ardent;

class Area extends Ardent {

	protected $guarded = array('created_at', 'updated_at');

	public static $rules = array(
		'name' => 'required',
		
	);

}
