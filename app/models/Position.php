<?php

use LaravelBook\Ardent\Ardent;

class Position extends Ardent {

	protected $guarded = array('created_at', 'updated_at');

	public static $rules = array(
		'name' => 'required',
		'subsidiary_id' => 'required',
		'is_scheduled' => 'required',
		
	);

}
