@extends('admin.layouts.master')

@section('title', __('Edit Tag'))

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.tag.index') }}">{{ __('Tags') }}</a></li>
    <li class="breadcrumb-item active">{{ __('Edit Tag') }}</li>
@endsection

@section('content')
    <div class="card tab2-card">
        <div class="card-header">
            <h5>{{ __('Edit Tag') }}</h5>
        </div>
        {!! Form::open(['route' => ['admin.tag.update', $tag->id], 'method' => 'PUT', 'class' => 'needs-validation']) !!}
        <div class="card-body">
            @include('admin.tag.fields')
        </div>
        <div class="card-footer">
            {!! Form::submit(__('static.save'), ['class' => 'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection
