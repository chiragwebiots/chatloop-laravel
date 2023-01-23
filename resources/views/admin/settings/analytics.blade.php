@extends('admin.layouts.master')

@section('title', __('Analytics'))

@section('breadcrumbs')
    <li class="breadcrumb-item active">{{ __('Settings') }}</li>
    <li class="breadcrumb-item active">{{ __('Analytics') }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card tab2-card">
                <div class="card-header">
                    <h5>{{ __('Analytics') }}</h5>
                </div>
                {!! Form::open(['route' => 'admin.setting.update', 'method' => 'PUT', 'class' => 'needs-validation user-add']) !!}
                <div class="card-body">
                    <div class="form-group row">
                        {!! Form::label('google_analytics', __('Google Analytics ID'), ['class' => 'col-xl-3 col-md-4']) !!}
                        <div class="col-xl-8 col-md-7">
                            {!! Form::text('google_analytics', $setting->google_analytics, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('facebook_pixel', __('Facebook Pixel ID'), ['class' => 'col-xl-3 col-md-4']) !!}
                        <div class="col-xl-8 col-md-7">
                            {!! Form::text('facebook_pixel', $setting->facebook_pixel, ['class' => 'form-control']) !!}
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
