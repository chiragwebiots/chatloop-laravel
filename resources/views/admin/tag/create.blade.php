@extends('admin.layouts.master')

@section('title', __('Create Tag'))

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.tag.index') }}">{{ __('Tags') }}</a></li>
    <li class="breadcrumb-item active">{{ __('Create Tag') }}</li>
@endsection

@section('content')
    <div class="card tab2-card">
        <div class="card-header">
            <h5>{{ __('Create Tag') }}</h5>
        </div>
        {!! Form::open(['route' => 'admin.tag.store', 'method' => 'POST', 'class' => 'needs-validation']) !!}
        <div class="card-body">
            @include('admin.tag.fields')
        </div>
        <div class="card-footer">
            {!! Form::submit(__('static.save'), ['class' => 'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection
