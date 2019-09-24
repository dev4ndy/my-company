@extends('layouts.app')
@push('styles')
  <link href="{{asset('css/styles.css')}}" rel="stylesheet">
@endpush
@push('scripts')
  <script src="{{asset('js/edit.js')}}" type="text/javascript"></script>
@endpush
@section('content')
<div class="container">
  <div class="card">
    <h4 class="card-header">Edit company</h4>
    <div class="card-body">
      <form action="{{route('company.update', $company->id)}}" method="post" enctype="multipart/form-data" novalidate>
        @csrf
        @method('PUT')
        <div class="form-row">
          <div class="form-group col">
            <label for="name">Name</label>
            <input type="text" value="{{$company->name}}" class="form-control @error('name') is-invalid @enderror" id="name"  name="name">
            @if($errors->has('name'))
              <ul class="invalid-feedback">
                @foreach ($errors->get('name') as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            @endif
          </div>
          <div class="form-group col">
            <label for="email">Email</label>
            <input type="email" value="{{$company->email}}" class="form-control @error('email') is-invalid @enderror" id="email"  name="email">
            @if($errors->has('email'))
              <ul class="invalid-feedback">
                @foreach ($errors->get('email') as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            @endif
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col">
            <label for="website">Website</label>
            <input type="text" value="{{$company->website}}" class="form-control @error('website') is-invalid @enderror" id="website"  name="website">
            @if($errors->has('website'))
              <ul class="invalid-feedback">
                @foreach ($errors->get('website') as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            @endif
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col">
            <label for="logo">Logo</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="logo"  name="logo">
              <label class="custom-file-label" for="logo">Choose logo image</label>
            </div>
            @if($errors->has('logo'))
              <ul class="invalid-feedback">
                @foreach ($errors->get('logo') as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            @endif
          </div>
        </div>
          <div class="form-row {{$company->logo ? '' : 'd-none' }}" id="content-logo-view">
            <div class="col p-1">
              <img src="{{ $company->logo ? asset('storage/'.$company->logo) : '' }}" class="img-thumbnail" id="old-logo" width="100" height="100" />
              <input type="hidden" name="old_logo" value="{{ $company->logo }}" />
              <button type="button" class="btn btn-outline-danger" id="remove-logo">Remove</button>
            </div>
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>
@endsection