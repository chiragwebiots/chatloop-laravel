@extends('admin.layouts.master')

@section('title', __('Home Banner'))

@section('breadcrumbs')
    <li class="breadcrumb-item active">{{ __('Sections') }}</li>
    <li class="breadcrumb-item active">{{ __('Home Banner') }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card tab2-card">
                <div class="card-header">
                    <h5>{{ __('Home Banner') }}</h5>
                </div>
                {!! Form::open([
                    'route' => ['admin.section.update', $section->id],
                    'method' => 'PUT',
                    'class' => 'needs-validation user-add',
                ]) !!}
                {!! Form::hidden('section_name', 'home') !!}
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
                        {!! Form::label('sub_title', __('Sub Title'), ['class' => 'col-xl-3 col-md-4']) !!}
                        <div class="col-xl-8 col-md-7">
                            {!! Form::text(
                                'sub_title',
                                isset($section->content['sub_title']) ? $section->content['sub_title'] : old('sub_title'),
                                ['class' => 'form-control'],
                            ) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('description', __('Description'), ['class' => 'col-xl-3 col-md-4']) !!}
                        <div class="col-xl-8 col-md-7">
                            {!! Form::textarea(
                                'description',
                                isset($section->content['description']) ? $section->content['description'] : old('description'),
                                ['class' => 'form-control'],
                            ) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('play_store_link', __('Play Store Link'), ['class' => 'col-xl-3 col-md-4']) !!}
                        <div class="col-xl-8 col-md-7">
                            {!! Form::url(
                                'play_store_link',
                                isset($section->content['play_store_link']) ? $section->content['play_store_link'] : old('play_store_link'),
                                ['class' => 'form-control', 'placeholder' => 'https://www.google.com/'],
                            ) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('app_store_link', __('App Store Link'), ['class' => 'col-xl-3 col-md-4']) !!}
                        <div class="col-xl-8 col-md-7">
                            {!! Form::url(
                                'app_store_link',
                                isset($section->content['app_store_link']) ? $section->content['app_store_link'] : old('app_store_link'),
                                ['class' => 'form-control', 'placeholder' => 'https://www.google.com/'],
                            ) !!}
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
                </div>
                <div class="card-footer">
                    {!! Form::submit(__('static.save'), ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
