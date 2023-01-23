@extends('admin.layouts.master')

@section('title', __('Contact'))

@section('breadcrumbs')
    <li class="breadcrumb-item active">{{ __('Sections') }}</li>
    <li class="breadcrumb-item active">{{ __('Contact') }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card tab2-card">
                <div class="card-header">
                    <h5>Contact</h5>
                </div>
                {!! Form::open([
                    'route' => ['admin.section.update', $section->id],
                    'method' => 'PUT',
                    'class' => 'needs-validation user-add',
                ]) !!}
                {!! Form::hidden('section_name', 'contact') !!}
                <div class="card-body">
                    <div class="form-group row">
                        {!! Form::label('title', __('static.title') . ' <span>*</span>', ['class' => 'col-xl-3 col-md-4'], false) !!}
                        <div class="col-xl-8 col-md-7">
                            {!! Form::text('title', isset($section->content['title']) ? $section->content['title'] : old('title'), [
                                'class' => 'form-control',
                            ]) !!}
                            @error('title')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label(
                            'description',
                            __('static.description') . ' <span>*</span>',
                            ['class' => 'col-xl-3 col-md-4'],
                            false,
                        ) !!}
                        <div class="col-xl-8 col-md-7">
                            {!! Form::text(
                                'description',
                                isset($section->content['description']) ? $section->content['description'] : old('description'),
                                ['class' => 'form-control'],
                            ) !!}
                            @error('description')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('location', __('static.location') . ' <span>*</span>', ['class' => 'col-xl-3 col-md-4'], false) !!}
                        <div class="col-xl-8 col-md-7">
                            {!! Form::text(
                                'location',
                                isset($section->content['location']) ? $section->content['location'] : old('location'),
                                ['class' => 'form-control'],
                            ) !!}
                            @error('location')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('call_us', __('static.call_us') . ' <span>*</span>', ['class' => 'col-xl-3 col-md-4'], false) !!}
                        <div class="col-xl-8 col-md-7">
                            {!! Form::text('call_us', isset($section->content['call_us']) ? $section->content['call_us'] : old('call_us'), [
                                'class' => 'form-control',
                            ]) !!}
                            @error('call_us')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('email_us', __('static.email_us') . ' <span>*</span>', ['class' => 'col-xl-3 col-md-4'], false) !!}
                        <div class="col-xl-8 col-md-7">
                            {!! Form::email(
                                'email_us',
                                isset($section->content['email_us']) ? $section->content['email_us'] : old('email_us'),
                                ['class' => 'form-control'],
                            ) !!}
                            @error('email_us')
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
