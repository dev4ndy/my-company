@extends('layouts.app')
@push('scripts')
  <script src="{{asset('js/modal-confirm-delete.js')}}" type="text/javascript"></script>
@endpush
@section('content')
<div class="container">
    <div class="d-flex bd-highlight">
        <div class="p-2 bd-highlight">
            <h1>Admin. Companies</h1>
        </div>
        <div class="ml-auto p-2 bd-highlight">
            <a class="btn btn-primary" href="{{route('company.create')}}">Add Company</a>
        </div>
    </div>
    @if($message = Session::get('success.company'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{$message}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card">
        <h4 class="card-header">List of companies</h4>
        <div class="card-body">
            <p class="card-text">
                @if (count($companies) > 0)
                    {{ $companies->links() }}
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Website</th>
                            <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($companies as $company)
                                <tr>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->email}}</td>
                                    <td>{{ $company->website}}</td>
                                    <td>
                                        <a href="{{route('company.show', $company->id)}}" title="Show" class="btn btn-outline-info">
                                            <span class="fa fa-eye"></span>
                                        </a>
                                        <a href="{{route('company.edit', $company->id)}}" title="Edit" class="btn btn-outline-primary">
                                            <span class="fa fa-pen"></span>
                                        </a>
                                        <button type="button" title="Remove" data-toggle="modal" data-target="#modal-confirm-delete" data-entity-id="{{ $company->id }}" data-entity="company" class="btn btn-outline-danger">
                                            <span class="fa fa-trash"></span>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $companies->links() }}
                @else
                    <div class="d-flex justify-content-center">
                        <h3>There are no records, you haven't created any company yet.</h3>
                    </div> 
                @endif
            </p>
        </div>
    </div>
</div>
@confirmDelete
@endconfirmDelete
@endsection