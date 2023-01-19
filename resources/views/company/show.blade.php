@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Company/show') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <img src="{{config('app.url').'/storage/'.$company->logo}}" alt="" width="100" height="100">
                        <h4>{{$company->name}}</h4>
                        <strong>{{$company->email}}</strong>
                        <strong>{{$company->web_site}}</strong><br><br><br>
                            <Strong>Employees</Strong>
                            @foreach($company->employees as $employee)
                                <li>Employee No. {{$employee->id}}: {{$employee->name}} {{$employee->surname}}</li>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
