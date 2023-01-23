@extends('admin.layouts.master')

@section('title', __('Create Plan'))

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.pricing-plan.index') }}">{{ __('Our Plan') }}</a></li>
    <li class="breadcrumb-item active">{{ __('Create') }}</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>{{ __('Create Plan') }}</h5>
        </div>
        {!! Form::open(['route' => 'admin.pricing-plan.store', 'method' => 'POST', 'class' => 'needs-validation']) !!}
        <div class="card-body">
            @include('admin.pricing-plan.fields')
        </div>
        <div class="card-footer">
            {!! Form::submit(__('static.save'), ['class' => 'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection
