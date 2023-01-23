@extends('admin.layouts.master')

@section('title', __('static.social_links.edit'))

@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route('admin.social-links.index') }}">{{ __('static.theme_option') }}</a>
    </li>
    <li class="breadcrumb-item active">{{ __('static.social_links.create') }}</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>{{ __('static.social_links.edit') }}</h5>
        </div>
        {!! Form::open([
            'route' => ['admin.social-links.update', $social_link->id],
            'method' => 'PUT',
            'class' => 'needs-validation',
        ]) !!}
        <div class="card-body">
            @include('admin.theme_options.social-links.fields')
        </div>
        <div class="card-footer">
            {!! Form::submit(__('static.save'), ['class' => 'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection
