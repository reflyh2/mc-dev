@extends('layouts/default')

{{-- Web site Title --}}
@section('title')
[Model]&nbsp;
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

            {{ Form::model($model, array('route' => array('[object].update', $model->id), 'method' => 'put', 'class' => 'form-horizontal form-bordered')) }}
                [FormContent]

                <div class="form-group form-actions">
                    <div class="col-md-offset-3 col-md-9">   
                        <a class="btn btn-primary" href="{{ route('[object].index') }}">
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