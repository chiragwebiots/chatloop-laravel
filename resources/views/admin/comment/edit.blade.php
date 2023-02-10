@extends('admin.layouts.master')

@section('title', __('Edit Comment'))

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.comment.index') }}">{{ __('Posts') }}</a></li>
    <li class="breadcrumb-item active">{{ __('Edit Comment') }}</li>
@endsection

@section('content')
    <div class="card tab2-card">
        <div class="card-header">
            <h5>{{ __('Edit Comment') }}</h5>
        </div>
        {!! Form::open(['route' => ['admin.comment.update', $comment->id], 'method' => 'PUT', 'class' => 'needs-validation']) !!}
        <div class="card-body">
            @include('admin.comment.fields')
        </div>
        <div class="card-footer">
            {!! Form::submit(__('static.save'), ['class' => 'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection
