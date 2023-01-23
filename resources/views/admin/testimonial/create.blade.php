@extends('admin.layouts.master')

@section('title', __('Create Testimonial'))

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.testimonial.index') }}">{{ __('Testimonial') }}</a></li>
    <li class="breadcrumb-item active">{{ __('Create') }}</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>{{ __('Create Testimonial') }}</h5>
        </div>
        {!! Form::open(['route' => 'admin.testimonial.store', 'method' => 'POST', 'class' => 'needs-validation']) !!}
        <div class="card-body">
            @include('admin.testimonial.fields')
        </div>
        <div class="card-footer">
            {!! Form::submit(__('static.save'), ['class' => 'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection
