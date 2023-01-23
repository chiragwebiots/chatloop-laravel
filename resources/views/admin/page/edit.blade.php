@extends('admin.layouts.master')

@section('title', __('static.pages.edit'))

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.page.index') }}">{{ __('static.pages.pages') }}</a></li>
    <li class="breadcrumb-item active">{{ __('static.pages.edit') }}</li>
@endsection

@section('content')
    <div class="card tab2-card">
        <div class="card-header">
            <h5>{{ __('static.pages.edit') }}</h5>
        </div>
        {!! Form::open(['route' => ['admin.page.update', $page->id], 'method' => 'PUT', 'class' => 'needs-validation']) !!}
        <div class="card-body">
            @include('admin.page.fields')
        </div>
        <div class="card-footer">
            {!! Form::submit(__('static.save'), ['class' => 'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection
