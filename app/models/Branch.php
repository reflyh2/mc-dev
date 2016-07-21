<?php

use LaravelBook\Ardent\Ardent;

class Branch extends Ardent {

	protected $guarded = array('created_at', 'updated_at');

	public static $rules = array(
		'name' => 'required',
		'address' => 'required',
		'city' => 'required',
		'province' => 'required',
		'country' => 'required',
		'postal_code' => 'required',
		'phone' => 'required',
		
	);

}
