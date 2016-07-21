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
            @if (Session::has('success_message'))
                <div class="alert alert-success">{{ Session::get('success_message') }}</div>
            @endif

            <a href="{{ route('accounts.create') }}" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-plus"></span> @lang('button.create')</a>

            @if ($model->count() >= 1) 

                {{ $model->links() }}

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">account_no</th>
							<th class="text-center">name</th>
							<th class="text-center">type</th>
							<th class="text-center">parent_id</th>
							<th class="text-center">level</th>
							<th class="text-center">is_parent</th>
							<th class="text-center">normal_balance</th>
							
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($model as $object)
                        <tr>
                            <td>{{ $object->account_no }}</td>
							<td>{{ $object->name }}</td>
							<td>{{ $object->type }}</td>
							<td>{{ $object->parent_id }}</td>
							<td>{{ $object->level }}</td>
							<td>{{ $object->is_parent }}</td>
							<td>{{ $object->normal_balance }}</td>
							
                            <td>
                                <a href="{{ route('accounts.edit', $object->id) }}">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                                <a href="{{ route('accounts.show', $object->id) }}">
                                    <span class="glyphicon glyphicon-list-alt"></span>
                                </a>
                                {{ Form::open(array('route' => array('accounts.destroy', $object->id), 'method' => 'delete', 'class' => 'form-delete')) }}
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
