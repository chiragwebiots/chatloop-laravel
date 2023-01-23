@extends('admin.layouts.master')

@section('title', __('FAQ\'s'))

@section('breadcrumbs')
    <li class="breadcrumb-item active">{{ __('Sections') }}</li>
    <li class="breadcrumb-item active">{{ __('FAQ\'s') }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card tab2-card">
                <div class="card-header">
                    <h5>{{ __('FAQ\'s') }}</h5>
                </div>
                {!! Form::open([
                    'route' => ['admin.section.update', $section->id],
                    'method' => 'PUT',
                    'class' => 'needs-validation user-add',
                ]) !!}
                {!! Form::hidden('section_name', 'faq') !!}
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
                    <div class="form-group row ">
                        {!! Form::label('image', __('Image'), ['class' => 'col-xl-3 col-md-4']) !!}
                        <div class="col-xl-8 col-md-7">
                            {!! Form::file('image', [
                                'class' => 'form-control media-manager',
                                'onclick' => 'return false',
                                'multiple' => false,
                            ]) !!}
                            {!! Form::hidden('image', isset($section->image) ? $section->image : null, ['class' => 'selected-file']) !!}
                            <div select="image" class="row upload-card selected-media selected-custom-row g-3 pt-3"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('image_align', __('Image Alignment'), ['class' => 'col-xl-3 col-md-4'], false) !!}
                        <div class="col-xl-8 col-md-7">
                            {{ Form::select('image_align', ['left' => 'Left', 'right' => 'Right'], isset($section->content['image_align']) ? $section->content['image_align'] : old('image_align'), ['class' => 'form-control select-2', 'placeholder' => 'Select Alignment']) }}
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
