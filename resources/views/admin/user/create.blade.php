@extends('admin.layouts.master')

@section('title', __('static.users.create'))

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">{{ __('static.users.users') }}</a></li>
    <li class="breadcrumb-item active">{{ __('static.users.create') }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card tab2-card">
                <div class="card-header">
                    <h5>{{ __('static.users.create') }}</h5>
                </div>
                {!! Form::open(['route' => 'admin.user.store', 'method' => 'POST', 'class' => 'needs-validation user-add']) !!}
                <div class="card-body">
                    <div class="form-group row">
                        {!! Form::label('name', __('static.name') . ' <span>*</span>', ['class' => 'col-xl-3 col-md-4'], false) !!}
                        <div class="col-xl-8 col-md-7">
                            {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                            @error('name')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('email', __('static.email') . ' <span>*</span>', ['class' => 'col-xl-3 col-md-4'], false) !!}
                        <div class="col-xl-8 col-md-7">
                            {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                            @error('email')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('password', __('static.password') . ' <span>*</span>', ['class' => 'col-xl-3 col-md-4'], false) !!}
                        <div class="col-xl-8 col-md-7">
                            {!! Form::password('password', ['class' => 'form-control']) !!}
                            @error('password')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label(
                            'confirm_password',
                            __('static.confirm_password') . ' <span>*</span>',
                            ['class' => 'col-xl-3 col-md-4'],
                            false,
                        ) !!}
                        <div class="col-xl-8 col-md-7">
                            {!! Form::password('confirm_password', ['class' => 'form-control']) !!}
                            @error('confirm_password')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('roles', __('static.roles.roles') . ' <span>*</span>', ['class' => 'col-xl-3 col-md-4'], false) !!}
                        <div class="col-xl-8 col-md-7">
                            {{ Form::select('role', $roles, old('role'), ['class' => 'form-control select-2', 'placeholder' => 'Select Role']) }}
                            @error('role')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    {!! Form::submit(__('static.save'), ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
