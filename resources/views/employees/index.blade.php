@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Companies') }}</div>
                    <a href="{{route('employees.create')}}" class="btn btn-success">Create new employee</a>
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
                                <th scope="col">Surname</th>
                                <th scope="col">Email</th>
                                <th scope="col">Company</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($employees as $employee)
                                <tr>
                                    <th scope="row">{{$employee->name}}</th>
                                    <th>{{$employee->surname}}</th>
                                    <td>{{$employee->email}}</td>
                                    <td>{{$employee->company->name}}</td>
                                    <td>{{$employee->phone}}</td>
                                    <td><a href="{{route('employees.show',$employee)}}" class="btn btn-success">More</a><a href="{{route('employees.edit',$employee)}}" class="btn btn-danger">Edit</a>
                                        <form method="POST" action="{{ route('employees.destroy',$employee) }}">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                            <input type="submit" class="btn btn-dark" value="Delete">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $employees->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
