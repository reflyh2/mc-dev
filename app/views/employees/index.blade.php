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
            @if (Session::has('success_message'))
                <div class="alert alert-success">{{ Session::get('success_message') }}</div>
            @endif

            <a href="{{ route('employees.create') }}" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-plus"></span> @lang('button.create')</a>

            @if ($model->count() >= 1) 

                {{ $model->links() }}

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Employee No</th>
							<th class="text-center">First Name</th>
							<th class="text-center">Middle Name</th>
							<th class="text-center">Last Name</th>
							<th class="text-center">Email</th>
							<th class="text-center">Dob</th>
							<th class="text-center">Gender</th>
							<th class="text-center">Country</th>
							<th class="text-center">State</th>
							<th class="text-center">City</th>
							<th class="text-center">Address</th>
							<th class="text-center">Postal</th>
							<th class="text-center">Phone</th>
							<th class="text-center">Contract</th>
							<th class="text-center">Start Date</th>
							<th class="text-center">End Date</th>
							<th class="text-center">Tax Code</th>
							<th class="text-center">Basic Salary</th>
							<th class="text-center">Functional Allowance</th>
							<th class="text-center">Meal Transport Allowance</th>
							<th class="text-center">Other Allowance</th>
							<th class="text-center">Is Active</th>
							<th class="text-center">Subsidiary Id</th>
							<th class="text-center">Branch Id</th>
							<th class="text-center">Position Id</th>
							<th class="text-center">Overtime Allowance</th>
							<th class="text-center">Marital Status</th>
							<th class="text-center">Insurance Allowance</th>
							<th class="text-center">Holiday Allowance</th>
							<th class="text-center">Absent Allowance</th>
							<th class="text-center">Union Dues</th>
							<th class="text-center">Area Id</th>
							
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($model as $object)
                        <tr>
                            <td>{{ $object->employee_no }}</td>
							<td>{{ $object->first_name }}</td>
							<td>{{ $object->middle_name }}</td>
							<td>{{ $object->last_name }}</td>
							<td>{{ $object->email }}</td>
							<td>{{ $object->dob }}</td>
							<td>{{ $object->gender }}</td>
							<td>{{ $object->country }}</td>
							<td>{{ $object->state }}</td>
							<td>{{ $object->city }}</td>
							<td>{{ $object->address }}</td>
							<td>{{ $object->postal }}</td>
							<td>{{ $object->phone }}</td>
							<td>{{ $object->contract }}</td>
							<td>{{ $object->start_date }}</td>
							<td>{{ $object->end_date }}</td>
							<td>{{ $object->tax_code }}</td>
							<td class="text-right">{{ number_format($object->basic_salary) }}</td>
							<td class="text-right">{{ number_format($object->functional_allowance) }}</td>
							<td class="text-right">{{ number_format($object->meal_transport_allowance) }}</td>
							<td class="text-right">{{ number_format($object->other_allowance) }}</td>
							<td>{{ $object->is_active }}</td>
							<td>{{ $object->subsidiary_id }}</td>
							<td>{{ $object->branch_id }}</td>
							<td>{{ $object->position_id }}</td>
							<td class="text-right">{{ number_format($object->overtime_allowance) }}</td>
							<td>{{ $object->marital_status }}</td>
							<td class="text-right">{{ number_format($object->insurance_allowance) }}</td>
							<td class="text-right">{{ number_format($object->holiday_allowance) }}</td>
							<td class="text-right">{{ number_format($object->absent_allowance) }}</td>
							<td class="text-right">{{ number_format($object->union_dues) }}</td>
							<td>{{ $object->area_id }}</td>
							
                            <td>
                                <a href="{{ route('employees.edit', $object->id) }}">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                                <a href="{{ route('employees.show', $object->id) }}">
                                    <span class="glyphicon glyphicon-list-alt"></span>
                                </a>
                                {{ Form::open(array('route' => array('employees.destroy', $object->id), 'method' => 'delete', 'class' => 'form-delete')) }}
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
