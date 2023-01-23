@extends('admin.layouts.master')

@section('title', __('Edit Plan'))

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.pricing-plan.index') }}">{{ __('Plan') }}</a></li>
    <li class="breadcrumb-item active">{{ __('Edit') }}</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>{{ __('Edit Plan') }}</h5>
        </div>
        {!! Form::open([
            'route' => ['admin.pricing-plan.update', $plan->id],
            'method' => 'PUT',
            'class' => 'needs-validation',
        ]) !!}
        <div class="card-body">
            @include('admin.pricing-plan.fields')
        </div>
        <div class="card-footer">
            {!! Form::submit(__('static.save'), ['class' => 'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection
