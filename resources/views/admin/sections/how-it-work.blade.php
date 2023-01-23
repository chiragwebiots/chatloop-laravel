@extends('admin.layouts.master')

@section('title', __('How It Work'))

@section('breadcrumbs')
    <li class="breadcrumb-item active">{{ __('Sections') }}</li>
    <li class="breadcrumb-item active">{{ __('How It Work') }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card tab2-card">
                <div class="card-header">
                    <h5>{{ __('How It Work') }}</h5>
                </div>
                {!! Form::open([
                    'route' => ['admin.section.update', $section->id],
                    'method' => 'PUT',
                    'class' => 'needs-validation user-add',
                ]) !!}
                {!! Form::hidden('section_name', 'how-it-work') !!}
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
                        {!! Form::label('description', __('Description'), ['class' => 'col-xl-3 col-md-4']) !!}
                        <div class="col-xl-8 col-md-7">
                            {!! Form::textarea(
                                'description',
                                isset($section->content['description']) ? $section->content['description'] : old('description'),
                                ['class' => 'form-control'],
                            ) !!}
                        </div>
                    </div>
                    @for ($i = 1; $i <= 3; $i++)
                        <div class="form-group row ">
                            {!! Form::label('icon_' . $i, __('Icon ' . $i), ['class' => 'col-xl-3 col-md-4']) !!}
                            <div class="col-xl-8 col-md-7">
                                {!! Form::file('icon_' . $i, [
                                    'class' => 'form-control media-manager',
                                    'onclick' => 'return false',
                                    'multiple' => false,
                                ]) !!}
                                {!! Form::hidden('icon_' . $i, isset($section->content['icon_' . $i]) ? $section->content['icon_' . $i] : null, [
                                    'class' => 'selected-file',
                                ]) !!}
                                <div select="icon_{{ $i }}"
                                    class="row upload-card selected-media selected-custom-row g-3 pt-3"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('title_' . $i, __('Title ' . $i), ['class' => 'col-xl-3 col-md-4']) !!}
                            <div class="col-xl-8 col-md-7">
                                {!! Form::text(
                                    'title_' . $i,
                                    isset($section->content['title_' . $i]) ? $section->content['title_' . $i] : old('title_' . $i),
                                    ['class' => 'form-control'],
                                ) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('description_' . $i, __('Description ' . $i), ['class' => 'col-xl-3 col-md-4']) !!}
                            <div class="col-xl-8 col-md-7">
                                {!! Form::text(
                                    'description_' . $i,
                                    isset($section->content['description_' . $i]) ? $section->content['description_' . $i] : old('description_' . $i),
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
