@extends('layouts/default')

{{-- Web site Title --}}
@section('title')
Employee&nbsp;
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
@stop

{{-- Content --}} 
@section('content')

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            @if (Session::has('error_message'))
                <div class="alert alert-danger">{{ Session::get('error_message') }}</div>
            @endif

            {{ Form::open(array('route' => 'employees.store', 'method' => 'post', 'class' => 'form-horizontal form-bordered')) }}
                <div class="form-group"><label class="col-md-4 control-label" for="employee_no">Employee No</label><div class="col-md-8">{{ Form::text('employee_no', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="first_name">First Name</label><div class="col-md-8">{{ Form::text('first_name', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="middle_name">Middle Name</label><div class="col-md-8">{{ Form::text('middle_name', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="last_name">Last Name</label><div class="col-md-8">{{ Form::text('last_name', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="email">Email</label><div class="col-md-8">{{ Form::text('email', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="dob">Dob</label><div class="col-md-8">{{ Form::text('dob', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="gender">Gender</label><div class="col-md-8">{{ Form::text('gender', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="country">Country</label><div class="col-md-8">{{ Form::text('country', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="state">State</label><div class="col-md-8">{{ Form::text('state', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="city">City</label><div class="col-md-8">{{ Form::text('city', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="address">Address</label><div class="col-md-8">{{ Form::text('address', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="postal">Postal</label><div class="col-md-8">{{ Form::text('postal', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="phone">Phone</label><div class="col-md-8">{{ Form::text('phone', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="contract">Contract</label><div class="col-md-8">{{ Form::text('contract', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="start_date">Start Date</label><div class="col-md-8">{{ Form::text('start_date', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="end_date">End Date</label><div class="col-md-8">{{ Form::text('end_date', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="tax_code">Tax Code</label><div class="col-md-8">{{ Form::text('tax_code', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="basic_salary">Basic Salary</label><div class="col-md-8">{{ Form::text('basic_salary', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="functional_allowance">Functional Allowance</label><div class="col-md-8">{{ Form::text('functional_allowance', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="meal_transport_allowance">Meal Transport Allowance</label><div class="col-md-8">{{ Form::text('meal_transport_allowance', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="other_allowance">Other Allowance</label><div class="col-md-8">{{ Form::text('other_allowance', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="is_active">Is Active</label><div class="col-md-8">{{ Form::text('is_active', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="subsidiary_id">Subsidiary Id</label><div class="col-md-8">{{ Form::select('subsidiary_id', Subsidiary::lists('name', 'id'), null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="branch_id">Branch Id</label><div class="col-md-8">{{ Form::select('branch_id', Branch::lists('name', 'id'), null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="position_id">Position Id</label><div class="col-md-8">{{ Form::select('position_id', Position::lists('name', 'id'), null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="overtime_allowance">Overtime Allowance</label><div class="col-md-8">{{ Form::text('overtime_allowance', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="marital_status">Marital Status</label><div class="col-md-8">{{ Form::text('marital_status', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="insurance_allowance">Insurance Allowance</label><div class="col-md-8">{{ Form::text('insurance_allowance', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="holiday_allowance">Holiday Allowance</label><div class="col-md-8">{{ Form::text('holiday_allowance', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="absent_allowance">Absent Allowance</label><div class="col-md-8">{{ Form::text('absent_allowance', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="union_dues">Union Dues</label><div class="col-md-8">{{ Form::text('union_dues', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="area_id">Area Id</label><div class="col-md-8">{{ Form::select('area_id', Area::lists('name', 'id'), null, array('class' => 'form-control')) }}</div></div>
				

                <div class="form-group form-actions">
                    <div class="col-md-offset-3 col-md-9">                                
                        <button type="submit" class="btn btn-primary">
                            <i class="glyphicon glyphicon-floppy-save"></i> @lang('button.save')
                        </button>
                        <a class="btn btn-danger" href="{{ route('employees.index') }}">
                            <i class="glyphicon glyphicon-arrow-left"></i> @lang('button.cancel')
                        </a>
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
    <!-- row-->
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
@stop
