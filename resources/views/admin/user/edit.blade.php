@extends('admin.layouts.master')

@section('title', __('static.users.edit'))

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">{{ __('static.users.users') }}</a></li>
    <li class="breadcrumb-item active">{{ __('static.users.edit') }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card tab2-card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link {{ $errors->has('name') || $errors->has('email') || $errors->has('role') || !$errors->any() ? 'active' : '' }}"
                                id="top-profile-tab" data-bs-toggle="tab" href="#top-profile" role="tab"
                                aria-controls="top-profile" aria-selected="true"><i data-feather="user"
                                    class="me-2"></i>Edit User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $errors->has('current_password') || $errors->has('new_password') || $errors->has('confirm_password') ? 'active' : '' }}"
                                id="changepassword-tab" data-bs-toggle="tab" href="#changepassword" role="tab"
                                aria-controls="changepassword" aria-selected="false"><i data-feather="settings"
                                    class="me-2"></i>Change Password</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="top-tabContent">
                        <div class="tab-pane fade {{ $errors->has('name') || $errors->has('email') || !$errors->any() ? 'show active' : '' }}"
                            id="top-profile" role="tabpanel" aria-labelledby="top-profile-tab">
                            {!! Form::open([
                                'route' => ['admin.user.update', $user->id],
                                'method' => 'PUT',
                                'class' => 'needs-validation user-add',
                            ]) !!}
                            <div class="form-group row">
                                {!! Form::label('name', __('static.name') . ' <span>*</span>', ['class' => 'col-xl-2 col-md-3'], false) !!}
                                <div class="col-xl-7 col-md-8">
                                    {!! Form::text('name', isset($user->name) ? $user->name : old('name'), ['class' => 'form-control']) !!}
                                    @error('name')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                {!! Form::label('email', __('static.email') . ' <span>*</span>', ['class' => 'col-xl-2 col-md-3'], false) !!}
                                <div class="col-xl-7 col-md-8">
                                    {!! Form::email('email', isset($user->email) ? $user->email : old('email'), ['class' => 'form-control']) !!}
                                    @error('email')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                {!! Form::label('roles', __('static.roles.roles') . ' <span>*</span>', ['class' => 'col-xl-2 col-md-3'], false) !!}
                                <div class="col-xl-7 col-md-8">
                                    {{ Form::select('role', $roles, isset($user->roles) ? $user->roles : old('role'), ['class' => 'form-control select-2', 'placeholder' => 'Select Role']) }}
                                    @error('role')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-footer">
                                {!! Form::submit(__('static.save'), ['class' => 'btn btn-primary']) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>
                        <div class="tab-pane fade {{ $errors->has('new_password') || $errors->has('confirm_password') ? 'active show' : '' }}"
                            id="changepassword" role="tabpanel" aria-labelledby="changepassword-tab">
                            <div class="account-setting">
                                {!! Form::open(['route' => ['admin.user.password.update', $user->id], 'method' => 'PUT']) !!}
                                <div class="form-group row">
                                    {!! Form::label('new_password', __('static.new_password'), ['class' => 'col-xl-2 col-md-3']) !!}
                                    <div class="col-xl-7 col-md-8">
                                        {!! Form::password('new_password', ['class' => 'form-control']) !!}
                                        @error('new_password')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    {!! Form::label('confirm_password', __('static.confirm_password'), ['class' => 'col-xl-2 col-md-3']) !!}
                                    <div class="col-xl-7 col-md-8">
                                        {!! Form::password('confirm_password', ['class' => 'form-control']) !!}
                                        @error('confirm_password')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-footer">
                                    {!! Form::submit(__('static.save'), ['class' => 'btn btn-primary']) !!}
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
