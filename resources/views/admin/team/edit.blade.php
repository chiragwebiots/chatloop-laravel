@extends('admin.layouts.master')

@section('title', __('Edit Team'))

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.team.index') }}">{{ __('Teams') }}</a></li>
    <li class="breadcrumb-item active">{{ __('Edit') }}</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>{{ __('Edit Team') }}</h5>
        </div>
        {!! Form::open(['route' => ['admin.team.update', $team->id], 'method' => 'PUT', 'class' => 'needs-validation']) !!}
        <div class="card-body">
            @include('admin.team.fields')
        </div>
        <div class="card-footer">
            {!! Form::submit(__('static.save'), ['class' => 'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection
