<?php

use LaravelBook\Ardent\Ardent;

class Account extends Ardent {

	protected $guarded = array('created_at', 'updated_at');

	public static $rules = array(
		'account_no' => 'required',
		'name' => 'required',
		'type' => 'required',
		'level' => 'required',
		'is_parent' => 'required',
		'normal_balance' => 'required',
		
	);

}
