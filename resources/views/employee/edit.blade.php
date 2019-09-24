@extends('layouts.app')
@push('styles')
  <link href="{{asset('css/styles.css')}}" rel="stylesheet">
@endpush
@section('content')
<div class="container">
  <div class="card">
    <h4 class="card-header">Edit employee</h4>
    <div class="card-body">
      <form action="{{route('employee.update', $employee->id)}}" method="post" enctype="multipart/form-data" novalidate>
        @csrf
        @method('PUT')
        <div class="form-row">
          <div class="form-group col">
            <label for="name">First name</label>
            <input type="text" value="{{$employee->name}}" class="form-control @error('name') is-invalid @enderror" id="name"  name="name">
            @if($errors->has('name'))
              <ul class="invalid-feedback">
                @foreach ($errors->get('name') as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            @endif
          </div>
          <div class="form-group col">
            <label for="last_name">Last name</label>
            <input type="text" value="{{$employee->last_name}}" class="form-control @error('last_name') is-invalid @enderror" id="last_name"  name="last_name">
            @if($errors->has('last_name'))
              <ul class="invalid-feedback">
                @foreach ($errors->get('last_name') as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            @endif
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col">
            <label for="email">Email</label>
            <input type="email" value="{{$employee->email}}" class="form-control @error('email') is-invalid @enderror" id="email"  name="email">
            @if($errors->has('email'))
              <ul class="invalid-feedback">
                @foreach ($errors->get('email') as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            @endif
          </div>
          <div class="form-group col">
              <label for="phone">Phone</label>
              <input type="tel" value="{{$employee->phone}}" class="form-control @error('phone') is-invalid @enderror" id="phone"  name="phone">
              @if($errors->has('phone'))
                <ul class="invalid-feedback">
                  @foreach ($errors->get('phone') as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              @endif
            </div>
        </div>
        <div class="form-row">
          <div class="form-group col">
              <label for="company_id">Company</label>
              <select class="form-control selectpicker" data-live-search="true" id="company_id" name="company_id">
                  <option value="">Select a company</option>
                  @foreach ($companies as $company)
                    <option value="{{$company->id}}" @if($employee->company && $employee->company->id == $company->id) selected @endif>{{$company->name}}</option>
                  @endforeach
              </select>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>
@endsection