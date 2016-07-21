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
            @if (Session::has('success_message'))
                <div class="alert alert-success">{{ Session::get('success_message') }}</div>
            @endif

            <a href="{{ route('branches.create') }}" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-plus"></span> @lang('button.create')</a>

            @if ($model->count() >= 1) 

                {{ $model->links() }}

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">name</th>
							<th class="text-center">address</th>
							<th class="text-center">city</th>
							<th class="text-center">province</th>
							<th class="text-center">country</th>
							<th class="text-center">postal_code</th>
							<th class="text-center">phone</th>
							<th class="text-center">subsidiary_id</th>
							<th class="text-center">code</th>
							<th class="text-center">area_id</th>
							
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($model as $object)
                        <tr>
                            <td>{{ $object->name }}</td>
							<td>{{ $object->address }}</td>
							<td>{{ $object->city }}</td>
							<td>{{ $object->province }}</td>
							<td>{{ $object->country }}</td>
							<td>{{ $object->postal_code }}</td>
							<td>{{ $object->phone }}</td>
							<td>{{ $object->subsidiary_id }}</td>
							<td>{{ $object->code }}</td>
							<td>{{ $object->area_id }}</td>
							
                            <td>
                                <a href="{{ route('branches.edit', $object->id) }}">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                                <a href="{{ route('branches.show', $object->id) }}">
                                    <span class="glyphicon glyphicon-list-alt"></span>
                                </a>
                                {{ Form::open(array('route' => array('branches.destroy', $object->id), 'method' => 'delete', 'class' => 'form-delete')) }}
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
