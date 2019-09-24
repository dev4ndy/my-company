@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Go to: <a href="{{route('company.index')}}">Companies</a><p>
                    <p>Go to: <a href="{{route('employee.index')}}">Employees</a><p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
