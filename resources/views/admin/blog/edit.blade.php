@extends('admin.layouts.master')

@section('title', __('Edit Post'))

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.blog.index') }}">{{ __('Posts') }}</a></li>
    <li class="breadcrumb-item active">{{ __('Edit Post') }}</li>
@endsection

@section('content')
    <div class="card tab2-card">
        <div class="card-header">
            <h5>{{ __('Edit Post') }}</h5>
        </div>
        {!! Form::open(['route' => ['admin.blog.update', $blog->id], 'method' => 'PUT', 'class' => 'needs-validation']) !!}
        <div class="card-body">
            @include('admin.blog.fields')
        </div>
        <div class="card-footer">
            {!! Form::submit(__('static.save'), ['class' => 'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection
