@extends('admin.layouts.master')

@section('title', __('static.roles.edit'))

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.role.index') }}">{{ __('static.roles.roles') }}</a></li>
    <li class="breadcrumb-item active">{{ __('static.roles.edit') }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            {!! Form::open([
                'route' => ['admin.role.update', $role->id],
                'method' => 'PUT',
                'class' => 'needs-validation user-add',
            ]) !!}

            <div class="card">

                @include('admin.role.fields')

                <div class="card-footer">
                    {!! Form::submit(__('static.save'), ['class' => 'btn btn-primary']) !!}
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection
