@extends('admin.layouts.master')

@section('title', __('static.profile'))

@section('breadcrumbs')
    <li class="breadcrumb-item active">{{ __('static.profile') }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card tab2-card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link {{ $errors->has('name') || $errors->has('email') || !$errors->any() ? 'active' : '' }}"
                                id="top-profile-tab" data-bs-toggle="tab" href="#top-profile" role="tab"
                                aria-controls="top-profile" aria-selected="true">
                                <i data-feather="user" class="me-2"></i>{{ __('static.profile') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $errors->has('current_password') || $errors->has('new_password') || $errors->has('confirm_password') ? 'active' : '' }}"
                                id="changepassword-tab" data-bs-toggle="tab" href="#changepassword" role="tab"
                                aria-controls="changepassword" aria-selected="false">
                                <i data-feather="settings" class="me-2"></i>{{ __('static.change_password') }}
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="top-tabContent">
                        <div class="tab-pane fade {{ $errors->has('name') || $errors->has('email') || !$errors->any() ? 'show active' : '' }}"
                            id="top-profile" role="tabpanel" aria-labelledby="top-profile-tab">
                            {!! Form::open(['route' => 'admin.account.profile.update', 'method' => 'PUT']) !!}
                            <div class="form-group row">
                                {!! Form::label('image', __('Image'), ['class' => 'col-xl-2 col-md-3'], false) !!}
                                <div class="col-xl-7 col-md-8">
                                    {!! Form::file('image', [
                                        'class' => 'form-control media-manager',
                                        'onclick' => 'return false',
                                        'multiple' => false,
                                    ]) !!}
                                    {!! Form::hidden('image', Auth::user()->image ? Auth::user()->image : null, ['class' => 'selected-file']) !!}
                                    <div select="image" class="row upload-card selected-media selected-custom-row g-3 pt-3">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                {!! Form::label('name', __('static.fullname'), ['class' => 'col-xl-2 col-md-3']) !!}
                                <div class="col-xl-7 col-md-8">
                                    {!! Form::text('name', Auth::user()->name ? Auth::user()->name : old('name'), ['class' => 'form-control']) !!}
                                    @error('name')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                {!! Form::label('email', __('static.email'), ['class' => 'col-xl-2 col-md-3']) !!}
                                <div class="col-xl-7 col-md-8">
                                    {!! Form::email('email', Auth::user()->email ? Auth::user()->email : old('email'), ['class' => 'form-control']) !!}
                                    @error('email')
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
                        <div class="tab-pane fade {{ $errors->has('current_password') || $errors->has('new_password') || $errors->has('confirm_password') ? 'active show' : '' }}"
                            id="changepassword" role="tabpanel" aria-labelledby="changepassword-tab">
                            <div class="account-setting">
                                {!! Form::open(['route' => 'admin.account.password.update', 'method' => 'PUT']) !!}
                                <div class="form-group row">
                                    {!! Form::label('current_password', __('static.current_password'), ['class' => 'col-xl-2 col-md-3']) !!}
                                    <div class="col-xl-7 col-md-8">
                                        {!! Form::password('current_password', ['class' => 'form-control']) !!}
                                        @error('current_password')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
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
