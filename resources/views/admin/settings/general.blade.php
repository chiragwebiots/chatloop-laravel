@extends('admin.layouts.master')

@section('title', __('General'))

@section('breadcrumbs')
    <li class="breadcrumb-item active">{{ __('Settings') }}</li>
    <li class="breadcrumb-item active">{{ __('General') }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card tab2-card">
                <div class="card-header">
                    <h5>{{ __('General') }}</h5>
                </div>
                {!! Form::open(['route' => 'admin.setting.update', 'method' => 'PUT', 'class' => 'needs-validation user-add']) !!}
                <div class="card-body">
                    <div class="form-group row">
                        {!! Form::label('site_name', __('Site Name'), ['class' => 'col-xl-3 col-md-4']) !!}
                        <div class="col-xl-8 col-md-7">
                            {!! Form::text('site_name', $setting->site_name, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('site_tagline', __('Tagline'), ['class' => 'col-xl-3 col-md-4']) !!}
                        <div class="col-xl-8 col-md-7">
                            {!! Form::text('site_tagline', $setting->site_tagline, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('site_url', __('Site URL'), ['class' => 'col-xl-3 col-md-4']) !!}
                        <div class="col-xl-8 col-md-7">
                            {!! Form::text('site_url', $setting->site_url, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('administration_email', __('Administration Email Address'), ['class' => 'col-xl-3 col-md-4']) !!}
                        <div class="col-xl-8 col-md-7">
                            {!! Form::email('administration_email', $setting->administration_email, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('timezone', __('Timezone'), ['class' => 'col-xl-3 col-md-4']) !!}
                        <div class="col-xl-8 col-md-7">
                            {{ Form::select('timezone', $timezone, $setting->timezone, ['class' => 'form-control select-2', 'placeholder' => 'Select Timezone']) }}
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
