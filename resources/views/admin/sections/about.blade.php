@extends('admin.layouts.master')

@section('title', __('About'))

@section('breadcrumbs')
    <li class="breadcrumb-item active">{{ __('Sections') }}</li>
    <li class="breadcrumb-item active">{{ __('About') }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card tab2-card">
                <div class="card-header">
                    <h5>{{ __('About') }}</h5>
                </div>
                {!! Form::open([
                    'route' => ['admin.section.update', $section->id],
                    'method' => 'PUT',
                    'class' => 'needs-validation user-add',
                ]) !!}
                {!! Form::hidden('section_name', 'about') !!}
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
                        {!! Form::label('content1', __('Content 1'), ['class' => 'col-xl-3 col-md-4']) !!}
                        <div class="col-xl-8 col-md-7">
                            {!! Form::text(
                                'content1',
                                isset($section->content['content1']) ? $section->content['content1'] : old('content1'),
                                ['class' => 'form-control'],
                            ) !!}
                        </div>
                    </div>
                    <div class="form-group row ">
                        {!! Form::label('icon1', __('Icon 1'), ['class' => 'col-xl-3 col-md-4']) !!}
                        <div class="col-xl-8 col-md-7">
                            {!! Form::file('icon1', [
                                'class' => 'form-control media-manager',
                                'onclick' => 'return false',
                                'multiple' => false,
                            ]) !!}
                            {!! Form::hidden('icon1', isset($section->content['icon1']) ? $section->content['icon1'] : null, [
                                'class' => 'selected-file',
                            ]) !!}
                            <div select="icon1" class="row upload-card selected-media selected-custom-row g-3 pt-3"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('content2', __('Content 2'), ['class' => 'col-xl-3 col-md-4']) !!}
                        <div class="col-xl-8 col-md-7">
                            {!! Form::text(
                                'content2',
                                isset($section->content['content2']) ? $section->content['content2'] : old('content2'),
                                ['class' => 'form-control'],
                            ) !!}
                        </div>
                    </div>
                    <div class="form-group row ">
                        {!! Form::label('icon2', __('Icon 2'), ['class' => 'col-xl-3 col-md-4']) !!}
                        <div class="col-xl-8 col-md-7">
                            {!! Form::file('icon2', [
                                'class' => 'form-control media-manager',
                                'onclick' => 'return false',
                                'multiple' => false,
                            ]) !!}
                            {!! Form::hidden('icon2', isset($section->content['icon2']) ? $section->content['icon2'] : null, [
                                'class' => 'selected-file',
                            ]) !!}
                            <div select="icon2" class="row upload-card selected-media selected-custom-row g-3 pt-3"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('content3', __('Content 3'), ['class' => 'col-xl-3 col-md-4']) !!}
                        <div class="col-xl-8 col-md-7">
                            {!! Form::text(
                                'content3',
                                isset($section->content['content3']) ? $section->content['content3'] : old('content3'),
                                ['class' => 'form-control'],
                            ) !!}
                        </div>
                    </div>
                    <div class="form-group row ">
                        {!! Form::label('icon3', __('Icon 3'), ['class' => 'col-xl-3 col-md-4']) !!}
                        <div class="col-xl-8 col-md-7">
                            {!! Form::file('icon3', [
                                'class' => 'form-control media-manager',
                                'onclick' => 'return false',
                                'multiple' => false,
                            ]) !!}
                            {!! Form::hidden('icon3', isset($section->content['icon3']) ? $section->content['icon3'] : null, [
                                'class' => 'selected-file',
                            ]) !!}
                            <div select="icon3" class="row upload-card selected-media selected-custom-row g-3 pt-3"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('content4', __('Content 4'), ['class' => 'col-xl-3 col-md-4']) !!}
                        <div class="col-xl-8 col-md-7">
                            {!! Form::text(
                                'content4',
                                isset($section->content['content4']) ? $section->content['content4'] : old('content4'),
                                ['class' => 'form-control'],
                            ) !!}
                        </div>
                    </div>
                    <div class="form-group row ">
                        {!! Form::label('icon4', __('Icon 4'), ['class' => 'col-xl-3 col-md-4']) !!}
                        <div class="col-xl-8 col-md-7">
                            {!! Form::file('icon4', [
                                'class' => 'form-control media-manager',
                                'onclick' => 'return false',
                                'multiple' => false,
                            ]) !!}
                            {!! Form::hidden('icon4', isset($section->content['icon4']) ? $section->content['icon4'] : null, [
                                'class' => 'selected-file',
                            ]) !!}
                            <div select="icon4" class="row upload-card selected-media selected-custom-row g-3 pt-3"></div>
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
