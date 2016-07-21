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
            @if (Session::has('success_message'))
                <div class="alert alert-success">{{ Session::get('success_message') }}</div>
            @endif

            <a href="{{ route('[object].create') }}" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-plus"></span> @lang('button.create')</a>

            @if ($model->count() >= 1) 

                {{ $model->links() }}

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            [TableHeader]
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($model as $object)
                        <tr>
                            [TableContent]
                            <td>
                                <a href="{{ route('[object].edit', $object->id) }}">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                                <a href="{{ route('[object].show', $object->id) }}">
                                    <span class="glyphicon glyphicon-list-alt"></span>
                                </a>
                                {{ Form::open(array('route' => array('[object].destroy', $object->id), 'method' => 'delete', 'class' => 'form-delete')) }}
                                    <button type="submit" class="btn-delete" onclick="confirm('Are you sure you want to delete this item?')">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </button>
                                {{ Form::close() }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $model->links() }}

            @else
                @lang('application.noresults')
            @endif
        </div>
    </div>    <!-- row-->
</section>

@stop

{{-- Body Bottom confirm modal --}}
@section('footer_scripts')
@stop
