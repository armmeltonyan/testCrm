@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Employee/show') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h4>{{$employee->name}} {{$employee->surname}}</h4><br>
                        <strong>Email: {{$employee->email}}</strong><br>
                        <strong>Company: {{$employee->company->name}}</strong><br>
                            <strong>phone: {{$employee->phone}}</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
