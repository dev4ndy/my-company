@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <h4 class="card-header">Show employee</h4>
        <div class="card-body">
            <h2 class="card-title">{{ $employee->name }} {{$employee->last_name}}</h2>
            <div class="card-text">
                <p><strong>Email:</strong> {{ $employee->email ?? 'Not provided' }}</p>
                <p><strong>Phone:</strong> {{ $employee->phone ?? 'Not provided' }}</p>
                <p><strong>Company:</strong> 
                    @if ($employee->company)
                        <a href="{{route('company.show', $employee->company->id)}}"> {{ $employee->company->name }} </a>                            
                    @else
                        Not provided
                    @endif
                </p>
            </div>
            <a href="{{route('employee.edit', $employee->id)}}" class="btn btn-primary">Edit</a>
        </div>
    </div>
</div>
@endsection