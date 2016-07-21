@extends('layouts/default')

{{-- Web site Title --}}
@section('title')
Branch&nbsp;
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

            {{ Form::model($model, array('route' => array('branches.update', $model->id), 'method' => 'put', 'class' => 'form-horizontal form-bordered')) }}
                <div class="form-group"><label class="col-md-4 control-label" for="name">Name</label><div class="col-md-8">{{ Form::text('name', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="address">Address</label><div class="col-md-8">{{ Form::text('address', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="city">City</label><div class="col-md-8">{{ Form::text('city', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="province">Province</label><div class="col-md-8">{{ Form::text('province', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="country">Country</label><div class="col-md-8">{{ Form::text('country', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="postal_code">Postal Code</label><div class="col-md-8">{{ Form::text('postal_code', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="phone">Phone</label><div class="col-md-8">{{ Form::text('phone', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="subsidiary_id">Subsidiary Id</label><div class="col-md-8">{{ Form::select('subsidiary_id', Subsidiary::lists('name', 'id'), null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="code">Code</label><div class="col-md-8">{{ Form::text('code', null, array('class' => 'form-control')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="area_id">Area Id</label><div class="col-md-8">{{ Form::select('area_id', Area::lists('name', 'id'), null, array('class' => 'form-control')) }}</div></div>
				

                <div class="form-group form-actions">
                    <div class="col-md-offset-3 col-md-9">                                
                        <button type="submit" class="btn btn-primary">
                            <i class="glyphicon glyphicon-floppy-save"></i> @lang('button.save')
                        </button>
                        <a class="btn btn-danger" href="{{ route('branches.index') }}">
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