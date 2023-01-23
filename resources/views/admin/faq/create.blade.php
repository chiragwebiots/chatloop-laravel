@extends('admin.layouts.master')

@section('title', __('Create FAQ'))

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.faq.index') }}">{{ __('FAQ\'s') }}</a></li>
    <li class="breadcrumb-item active">{{ __('Create') }}</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>{{ __('Create FAQ') }}</h5>
        </div>
        {!! Form::open(['route' => 'admin.faq.store', 'method' => 'POST', 'class' => 'needs-validation']) !!}
        <div class="card-body">
            @include('admin.faq.fields')
        </div>
        <div class="card-footer">
            {!! Form::submit(__('static.save'), ['class' => 'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection
