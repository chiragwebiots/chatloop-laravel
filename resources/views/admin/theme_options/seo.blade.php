@extends('admin.layouts.master')

@section('title', __('static.seo'))

@section('breadcrumbs')
    <li class="breadcrumb-item active">{{ __('Theme Options') }}</li>
    <li class="breadcrumb-item active">{{ __('static.seo') }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card tab2-card">
                <div class="card-header">
                    <h5>{{ __('static.seo') }}</h5>
                </div>
                {!! Form::open([
                    'route' => 'admin.theme.update',
                    'method' => 'PUT',
                    'class' => 'needs-validation user-add',
                ]) !!}
                <div class="card-body">

                    <div class="form-group row">
                        {!! Form::label('language', null, ['class' => 'col-xl-3 col-md-4']) !!}
                        <div class="col-xl-8 col-md-7">
                            {!! Form::text('language', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Form::label('meta_title', null, ['class' => 'col-xl-3 col-md-4']) !!}
                        <div class="col-xl-8 col-md-7">
                            {!! Form::text('meta_title', isset($theme->meta_title) ? $theme->meta_title : null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Form::label('meta_description', null, ['class' => 'col-xl-3 col-md-4']) !!}
                        <div class="col-xl-8 col-md-7">
                            {!! Form::text('meta_description', isset($theme->meta_description) ? $theme->meta_description : null, [
                                'class' => 'form-control',
                            ]) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Form::label('meta_keywords', null, ['class' => 'col-xl-3 col-md-4']) !!}
                        <div class="col-xl-8 col-md-7">
                            {!! Form::text('meta_keywords', isset($theme->meta_keywords) ? $theme->meta_keywords : null, [
                                'class' => 'form-control',
                            ]) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Form::label('author_name', null, ['class' => 'col-xl-3 col-md-4']) !!}
                        <div class="col-xl-8 col-md-7">
                            {!! Form::text('meta_author_name', isset($theme->meta_author_name) ? $theme->meta_author_name : null, [
                                'class' => 'form-control',
                            ]) !!}
                        </div>
                    </div>

                    <div class="form-group row ">
                        {!! Form::label('meta_image', null, ['class' => 'col-xl-3 col-md-4']) !!}
                        <div class="col-xl-8 col-md-7">
                            {!! Form::file('meta_image', [
                                'class' => 'form-control media-manager',
                                'onclick' => 'return false',
                                'multiple' => false,
                            ]) !!}
                            {!! Form::hidden('meta_image', isset($theme->meta_image) ? $theme->meta_image : null, [
                                'class' => 'selected-file',
                            ]) !!}
                            <div select="meta_image" class="row upload-card selected-media selected-custom-row g-3 pt-3">
                            </div>
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
