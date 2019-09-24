@extends('layouts.app')
@push('scripts')
  <script src="{{asset('js/modal-confirm-delete.js')}}" type="text/javascript"></script>
@endpush
@section('content')
<div class="container">
    <div class="d-flex bd-highlight">
        <div class="p-2 bd-highlight">
            <h1>Admin. Employees</h1>
        </div>
        <div class="ml-auto p-2 bd-highlight">
            <a class="btn btn-primary" href="{{route('employee.create')}}">Add Employee</a>
        </div>
    </div>
    @if($message = Session::get('success.employee'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{$message}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card">
        <h4 class="card-header">List of employees</h4>
        <div class="card-body">
            <p class="card-text">
                @if (count($employees) > 0)
                    {{ $employees->links() }}
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Last name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Company</th>
                            <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $employee)
                                <tr>
                                    <td>{{ $employee->name }}</td>
                                    <td>{{ $employee->last_name }}</td>
                                    <td>{{ $employee->email}}</td>
                                    <td>{{ $employee->phone}}</td>
                                    <td>{{ $employee->company ? $employee->company->name : ''}}</td>
                                    <td>
                                        <a href="{{route('employee.show', $employee->id)}}" title="Show" class="btn btn-outline-info">
                                            <span class="fa fa-eye"></span>
                                        </a>
                                        <a href="{{route('employee.edit', $employee->id)}}" title="Edit" class="btn btn-outline-primary">
                                            <span class="fa fa-pen"></span>
                                        </a>
                                        <button type="button" title="Remove" data-toggle="modal" data-target="#modal-confirm-delete" data-entity-id="{{ $employee->id }}" data-entity="employee" class="btn btn-outline-danger">
                                            <span class="fa fa-trash"></span>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $employees->links() }}
                @else
                    <div class="d-flex justify-content-center">
                        <h3>There are no records, you haven't created any employee yet.</h3>
                    </div> 
                @endif
            </p>
        </div>
    </div>
</div>
@confirmDelete
@endconfirmDelete
@endsection