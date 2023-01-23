@extends('admin.layouts.master')

@section('title', __('App Features'))

@section('breadcrumbs')
    <li class="breadcrumb-item active">{{ __('Sections') }}</li>
    <li class="breadcrumb-item active">{{ __('App Features') }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card tab2-card">
                <div class="card-header">
                    <h5>{{ __('App Features') }}</h5>
                </div>
                {!! Form::open([
                    'route' => ['admin.section.update', $section->id],
                    'method' => 'PUT',
                    'class' => 'needs-validation user-add',
                ]) !!}
                {!! Form::hidden('section_name', 'feature') !!}
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
                    @for ($i = 1; $i <= 8; $i++)
                        <div class="form-group row">
                            {!! Form::label('feature_title_' . $i, __('Feature Title ' . $i), ['class' => 'col-xl-3 col-md-4']) !!}
                            <div class="col-xl-8 col-md-7">
                                {!! Form::text(
                                    'feature_title_' . $i,
                                    isset($section->content['feature_title_' . $i])
                                        ? $section->content['feature_title_' . $i]
                                        : old('feature_title_' . $i),
                                    ['class' => 'form-control'],
                                ) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('feature_description_' . $i, __('Feature Description ' . $i), ['class' => 'col-xl-3 col-md-4']) !!}
                            <div class="col-xl-8 col-md-7">
                                {!! Form::text(
                                    'feature_description_' . $i,
                                    isset($section->content['feature_description_' . $i])
                                        ? $section->content['feature_description_' . $i]
                                        : old('feature_description_' . $i),
                                    ['class' => 'form-control'],
                                ) !!}
                            </div>
                        </div>
                    @endfor
                </div>
                <div class="card-footer">
                    {!! Form::submit(__('static.save'), ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
