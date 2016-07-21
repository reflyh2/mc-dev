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
            @if (Session::has('success_message'))
                <div class="alert alert-success">{{ Session::get('success_message') }}</div>
            @endif

            <a href="{{ route('users.create') }}" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-plus"></span> @lang('button.create')</a>

            @if ($model->count() >= 1) 

                {{ $model->links() }}

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Email</th>
							<th class="text-center">Password</th>
							<th class="text-center">Permissions</th>
							<th class="text-center">Activated</th>
							<th class="text-center">Activation Code</th>
							<th class="text-center">Activated At</th>
							<th class="text-center">Last Login</th>
							<th class="text-center">Persist Code</th>
							<th class="text-center">Reset Password Code</th>
							<th class="text-center">First Name</th>
							<th class="text-center">Last Name</th>
							<th class="text-center">Bio</th>
							<th class="text-center">Gender</th>
							<th class="text-center">Dob</th>
							<th class="text-center">Pic</th>
							<th class="text-center">Country</th>
							<th class="text-center">State</th>
							<th class="text-center">City</th>
							<th class="text-center">Address</th>
							<th class="text-center">Postal</th>
							<th class="text-center">Employee Id</th>
							<th class="text-center">Subsidiary Id</th>
							<th class="text-center">Branch Id</th>
							
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($model as $object)
                        <tr>
                            <td>{{ $object->email }}</td>
							<td>{{ $object->password }}</td>
							<td>{{ $object->permissions }}</td>
							<td>{{ $object->activated }}</td>
							<td>{{ $object->activation_code }}</td>
							<td>{{ $object->activated_at }}</td>
							<td>{{ $object->last_login }}</td>
							<td>{{ $object->persist_code }}</td>
							<td>{{ $object->reset_password_code }}</td>
							<td>{{ $object->first_name }}</td>
							<td>{{ $object->last_name }}</td>
							<td>{{ $object->bio }}</td>
							<td>{{ $object->gender }}</td>
							<td>{{ $object->dob }}</td>
							<td>{{ $object->pic }}</td>
							<td>{{ $object->country }}</td>
							<td>{{ $object->state }}</td>
							<td>{{ $object->city }}</td>
							<td>{{ $object->address }}</td>
							<td>{{ $object->postal }}</td>
							<td>{{ $object->employee_id }}</td>
							<td>{{ $object->subsidiary_id }}</td>
							<td>{{ $object->branch_id }}</td>
							
                            <td>
                                <a href="{{ route('users.edit', $object->id) }}">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                                <a href="{{ route('users.show', $object->id) }}">
                                    <span class="glyphicon glyphicon-list-alt"></span>
                                </a>
                                {{ Form::open(array('route' => array('users.destroy', $object->id), 'method' => 'delete', 'class' => 'form-delete')) }}
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
