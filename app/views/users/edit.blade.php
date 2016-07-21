@extends('layouts/default')

{{-- Web site Title --}}
@section('title')
User&nbsp;
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

            {{ Form::model($model, array('route' => array('users.update', $model->id), 'method' => 'put', 'class' => 'form-horizontal form-bordered')) }}
                <div class="form-group"><label class="col-md-4 control-label" for="email">Email</label><div class="col-md-8">{{ Form::text('email', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="password">Password</label><div class="col-md-8">{{ Form::text('password', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="permissions">Permissions</label><div class="col-md-8">{{ Form::text('permissions', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="activated">Activated</label><div class="col-md-8">{{ Form::text('activated', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="activation_code">Activation Code</label><div class="col-md-8">{{ Form::text('activation_code', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="activated_at">Activated At</label><div class="col-md-8">{{ Form::text('activated_at', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="last_login">Last Login</label><div class="col-md-8">{{ Form::text('last_login', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="persist_code">Persist Code</label><div class="col-md-8">{{ Form::text('persist_code', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="reset_password_code">Reset Password Code</label><div class="col-md-8">{{ Form::text('reset_password_code', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="first_name">First Name</label><div class="col-md-8">{{ Form::text('first_name', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="last_name">Last Name</label><div class="col-md-8">{{ Form::text('last_name', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="bio">Bio</label><div class="col-md-8">{{ Form::text('bio', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="gender">Gender</label><div class="col-md-8">{{ Form::text('gender', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="dob">Dob</label><div class="col-md-8">{{ Form::text('dob', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="pic">Pic</label><div class="col-md-8">{{ Form::text('pic', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="country">Country</label><div class="col-md-8">{{ Form::text('country', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="state">State</label><div class="col-md-8">{{ Form::text('state', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="city">City</label><div class="col-md-8">{{ Form::text('city', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="address">Address</label><div class="col-md-8">{{ Form::text('address', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="postal">Postal</label><div class="col-md-8">{{ Form::text('postal', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="employee_id">Employee Id</label><div class="col-md-8">{{ Form::select('employee_id', Employee::lists('name', 'id'), null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="subsidiary_id">Subsidiary Id</label><div class="col-md-8">{{ Form::select('subsidiary_id', Subsidiary::lists('name', 'id'), null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="branch_id">Branch Id</label><div class="col-md-8">{{ Form::select('branch_id', Branch::lists('name', 'id'), null, array('class' => 'form-control')) }}</div></div>
				

                <div class="form-group form-actions">
                    <div class="col-md-offset-3 col-md-9">                                
                        <button type="submit" class="btn btn-primary">
                            <i class="glyphicon glyphicon-floppy-save"></i> @lang('button.save')
                        </button>
                        <a class="btn btn-danger" href="{{ route('users.index') }}">
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