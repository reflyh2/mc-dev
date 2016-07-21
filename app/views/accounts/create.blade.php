@extends('layouts/default')

{{-- Web site Title --}}
@section('title')
Account&nbsp;
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

            {{ Form::open(array('route' => 'accounts.store', 'method' => 'post', 'class' => 'form-horizontal form-bordered')) }}
                <div class="form-group"><label class="col-md-4 control-label" for="account_no">Account No</label><div class="col-md-8">{{ Form::text('account_no', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="name">Name</label><div class="col-md-8">{{ Form::text('name', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="type">Type</label><div class="col-md-8">{{ Form::text('type', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="parent_id">Parent Id</label><div class="col-md-8">{{ Form::text('parent_id', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="level">Level</label><div class="col-md-8">{{ Form::text('level', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="is_parent">Is Parent</label><div class="col-md-8">{{ Form::text('is_parent', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="normal_balance">Normal Balance</label><div class="col-md-8">{{ Form::text('normal_balance', null, array('class' => 'form-control')) }}</div></div>
				

                <div class="form-group form-actions">
                    <div class="col-md-offset-3 col-md-9">                                
                        <button type="submit" class="btn btn-primary">
                            <i class="glyphicon glyphicon-floppy-save"></i> @lang('button.save')
                        </button>
                        <a class="btn btn-danger" href="{{ route('accounts.index') }}">
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
