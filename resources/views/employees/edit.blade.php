@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Employee/Edit') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('employees.update',$employee) }}">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $employee->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="surname" class="col-md-4 col-form-label text-md-end">{{ __('Surname') }}</label>

                                <div class="col-md-6">
                                    <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ $employee->surname}}" required autocomplete="surname" autofocus>

                                    @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="company_id" class="col-md-4 col-form-label text-md-end">{{ __('Company') }}</label>

                                <div class="col-md-6">
                                    <select name="company_id" id="company_id" class="form-control">
                                        @foreach($companies as $company)
                                            @if($company->id == $employee->company_id)
                                                <option value="{{$company->id}}" selected>{{$company->name}}</option>
                                            @endif
                                            <option value="{{$company->id}}">{{$company->name}}</option>
                                        @endforeach
                                    </select>

                                    @error('company')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $employee->email }}" autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone number') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control" name="phone" autocomplete="phone" value="{{$employee->phone}}">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
