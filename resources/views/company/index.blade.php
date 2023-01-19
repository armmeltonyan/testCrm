@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Companies') }}</div>
                    <a href="{{route('companies.create')}}" class="btn btn-success">Create new company</a>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Logo</th>
                                    <th scope="col">Web-site</th>
                                    <th scope="col">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($companies as $company)
                                <tr>
                                    <th scope="row">{{$company->name}}</th>
                                    <td>{{$company->email}}</td>
                                    <td><img src="{{config('app.url').'/storage/'.$company->logo}}" alt="" width="50" height="50"></td>
                                    <td>{{$company->web_site}}</td>
                                    <td><a href="{{route('companies.show',$company)}}" class="btn btn-success">More</a><a href="{{route('companies.edit',$company)}}" class="btn btn-danger">Edit</a>
                                        <form method="POST" action="{{ route('companies.destroy',$company) }}">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <input type="submit" class="btn btn-dark" value="Delete">
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $companies->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
