<?php

use LaravelBook\Ardent\Ardent;

class User extends Ardent {

	protected $guarded = array('created_at', 'updated_at');

	public static $rules = array(
		'email' => 'required',
		'password' => 'required',
		'activated' => 'required',
		
	);

}
