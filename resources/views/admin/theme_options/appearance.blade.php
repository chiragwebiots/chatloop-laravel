@extends('admin.layouts.master')

@section('title', __('static.appearance'))

@section('breadcrumbs')
    <li class="breadcrumb-item active">{{ __('static.theme_option') }}</li>
    <li class="breadcrumb-item active">{{ __('static.appearance') }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card tab2-card">
                <div class="card-header">
                    <h5>{{ __('static.appearance') }}</h5>
                </div>
                {!! Form::open([
                    'route' => 'admin.theme.update',
                    'method' => 'PUT',
                    'class' => 'needs-validation user-add',
                ]) !!}
                <div class="card-body">

                    <div class="form-group row">
                        {!! Form::label('primary_color', null, ['class' => 'col-xl-3 col-md-4']) !!}
                        {{-- <div class="col-xl-8 col-md-1"> changes --}}
                        <div class="col-xl-8 col-md-7">
                            <div class="d-flex w-100 color-form">
                                {!! Form::text('primary_color', isset($theme->primary_color) ? $theme->primary_color : '#5f57ea', [
                                    'class' => 'form-control',
                                    'id' => 'primary_color',
                                ]) !!}
                                {!! Form::color('color-box', isset($theme->primary_color) ? $theme->primary_color : '#5f57ea', [
                                    'class' => 'form-control fill-color',
                                    'id' => 'color-box',
                                ]) !!}
                                {{-- <i class="fa fa-repeat reset_icon mt-2 ms-2" aria-hidden="true"></i> --}}
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Form::label('secondary_color', null, ['class' => 'col-xl-3 col-md-4']) !!}
                        {{-- <div class="col-xl-8 col-md-1"> changes --}}
                        <div class="col-xl-8 col-md-7">
                            <div class="d-flex w-100 color-form">
                                {!! Form::text('secondary_color', isset($theme->secondary_color) ? $theme->secondary_color : '#9647db', [
                                    'class' => 'form-control',
                                    'id' => 'secondary_color',
                                ]) !!}
                                {!! Form::color('color-box-2', isset($theme->secondary_color) ? $theme->secondary_color : '#9647db', [
                                    'class' => 'form-control fill-color',
                                    'id' => 'color-box-2',
                                ]) !!}
                                {{-- <i class="fa fa-repeat reset_icon_2 mt-2 ms-2" aria-hidden="true"></i> --}}
                            </div>
                        </div>
                    </div>

                    <div class="form-group row ">
                        {!! Form::label('favic_icon', null, ['class' => 'col-xl-3 col-md-4']) !!}
                        <div class="col-xl-8 col-md-7">
                            {!! Form::file('favic_icon', [
                                'class' => 'form-control media-manager',
                                'onclick' => 'return false',
                                'multiple' => false,
                            ]) !!}
                            {!! Form::hidden('favic_icon', isset($theme->favic_icon) ? $theme->favic_icon : null, [
                                'class' => 'selected-file',
                            ]) !!}
                            <div select="favic_icon" class="row upload-card selected-media selected-custom-row g-3 pt-3">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row ">
                        {!! Form::label('site_logo', null, ['class' => 'col-xl-3 col-md-4']) !!}
                        <div class="col-xl-8 col-md-7">
                            {!! Form::file('site_logo', [
                                'class' => 'form-control media-manager',
                                'onclick' => 'return false',
                                'multiple' => false,
                            ]) !!}
                            {!! Form::hidden('site_logo', isset($theme->site_logo) ? $theme->site_logo : null, [
                                'class' => 'selected-file',
                            ]) !!}
                            <div select="site_logo" class="row upload-card selected-media selected-custom-row g-3 pt-3">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Form::label('copyright', null, ['class' => 'col-xl-3 col-md-4']) !!}
                        <div class="col-xl-8 col-md-7">
                            {!! Form::text('copyright', isset($theme->copyright) ? $theme->copyright : null, ['class' => 'form-control']) !!}
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
