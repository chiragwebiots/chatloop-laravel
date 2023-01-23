@extends('admin.layouts.master')

@section('title', __('static.comment'))

@section('breadcrumbs')
    <li class="breadcrumb-item active">{{ __('Theme Options') }}</li>
    <li class="breadcrumb-item active">{{ __('static.comment') }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card tab2-card">
                <div class="card-header">
                    <h5>{{ __('static.comment') }}</h5>
                </div>
                {!! Form::open([
                    'class' => 'needs-validation user-add',
                ]) !!}
                <div class="card-body">
                    <div class="form-group row form-check form-switch">
                        {!! Form::label('required_name_email', 'Comment author must fill out name and email', [
                            'class' => 'col-xl-3 col-md-4 h6 form-check-label',
                        ]) !!}
                        <div class="col-xl-8 col-md-7">
                            {!! Form::checkbox('required_name_email', true, $theme->required_name_email ? true : false, [
                                'class' => 'form-check-input toggle-class',
                            ]) !!}
                        </div>
                    </div>
                    <div class="form-group row form-check form-switch">
                        {!! Form::label('required_login', 'Users must be registered and logged in to comment', [
                            'class' => 'col-xl-3 col-md-4 h6 form-check-label',
                        ]) !!}
                        <div class="col-xl-8 col-md-7">
                            {!! Form::checkbox('required_login', true, $theme->required_login ? true : false, [
                                'class' => 'form-check-input toggle-class',
                            ]) !!}
                        </div>
                    </div>
                    <div class="form-group row form-check form-switch">
                        {!! Form::label('comment_approved', 'Comment must be manually approved', [
                            'class' => 'col-xl-3 col-md-4 h6 form-check-label',
                        ]) !!}
                        <div class="col-xl-8 col-md-7">
                            {!! Form::checkbox('comment_approved', true, $theme->comment_approved ? true : false, [
                                'class' => 'form-check-input toggle-class',
                            ]) !!}
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
