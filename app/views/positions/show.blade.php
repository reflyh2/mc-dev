@extends('layouts/default')

{{-- Web site Title --}}
@section('title')
Position&nbsp;
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

            {{ Form::model($model, array('route' => array('positions.update', $model->id), 'method' => 'put', 'class' => 'form-horizontal form-bordered')) }}
                <div class="form-group"><label class="col-md-4 control-label" for="name">Name</label><div class="col-md-8">{{ Form::text('name', null, array('class' => 'form-control', 'readonly' => 'readonly')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="subsidiary_id">Subsidiary Id</label><div class="col-md-8">{{ Form::select('subsidiary_id', Subsidiary::lists('name', 'id'), null, array('class' => 'form-control', 'readonly' => 'readonly')) }}</div></div>
				<div class="form-group"><label class="col-md-4 control-label" for="is_scheduled">Is Scheduled</label><div class="col-md-8">{{ Form::text('is_scheduled', null, array('class' => 'form-control', 'readonly' => 'readonly')) }}</div></div>
				

                <div class="form-group form-actions">
                    <div class="col-md-offset-3 col-md-9">   
                        <a class="btn btn-primary" href="{{ route('positions.index') }}">
                            <i class="glyphicon glyphicon-arrow-left"></i> @lang('button.back')
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