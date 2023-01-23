@extends('admin.layouts.master')

@section('title', __('Pricing Plan'))

@section('breadcrumbs')
    <li class="breadcrumb-item active">{{ __('Sections') }}</li>
    <li class="breadcrumb-item active">{{ __('Pricing Plan') }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card tab2-card">
                <div class="card-header">
                    <h5>{{ __('Pricing Plan') }}</h5>
                </div>
                {!! Form::open([
                    'route' => ['admin.section.update', $section->id],
                    'method' => 'PUT',
                    'class' => 'needs-validation user-add',
                ]) !!}
                {!! Form::hidden('section_name', 'pricing-plan') !!}
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
                </div>
                <div class="card-footer">
                    {!! Form::submit(__('static.save'), ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
