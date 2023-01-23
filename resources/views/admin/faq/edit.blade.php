@extends('admin.layouts.master')

@section('title', __('Edit FAQ'))

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.faq.index') }}">{{ __('FAQ\'s') }}</a></li>
    <li class="breadcrumb-item active">{{ __('Edit') }}</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>{{ __('Edit FAQ') }}</h5>
        </div>
        {!! Form::open(['route' => ['admin.faq.update', $faq->id], 'method' => 'PUT', 'class' => 'needs-validation']) !!}
        <div class="card-body">
            @include('admin.faq.fields')
        </div>
        <div class="card-footer">
            {!! Form::submit(__('static.save'), ['class' => 'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection
