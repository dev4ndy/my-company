@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <h4 class="card-header">Show company</h4>
        <div class="card-body">
            <img src="{{ $company->logo ? asset('storage/'.$company->logo) : '' }}" class="img-thumbnail" id="old-logo" width="100" height="100" />
            <h2 class="card-title">{{ $company->name }}</h2>
            <div class="card-text">
                <p><strong>Website:</strong> {{ $company->website }}</p>
                <p><strong>Email:</strong> {{ $company->email }}</p>
            </div>
            <a href="{{route('company.edit', $company->id)}}" class="btn btn-primary">Edit</a>
        </div>
    </div>
</div>
@endsection