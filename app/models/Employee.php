<?php

use LaravelBook\Ardent\Ardent;

class Employee extends Ardent {

	protected $guarded = array('created_at', 'updated_at');

	public static $rules = array(
		'employee_no' => 'required',
		'first_name' => 'required',
		'dob' => 'required',
		'gender' => 'required',
		'country' => 'required',
		'contract' => 'required',
		'start_date' => 'required',
		'basic_salary' => 'required',
		'functional_allowance' => 'required',
		'meal_transport_allowance' => 'required',
		'other_allowance' => 'required',
		'is_active' => 'required',
		'overtime_allowance' => 'required',
		'marital_status' => 'required',
		'insurance_allowance' => 'required',
		'holiday_allowance' => 'required',
		'absent_allowance' => 'required',
		'union_dues' => 'required',
		
	);

}
