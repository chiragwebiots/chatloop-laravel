@extends('admin.layouts.master')

@section('title', __('static.media.upload'))

@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/vendors/dropzone.css') }}">
@endpush

@section('breadcrumbs')
    <li class="breadcrumb-item"><a href="{{ route('admin.media.index') }}">{{ __('static.media.media') }}</a></li>
    <li class="breadcrumb-item active">{{ __('static.media.upload') }}</li>
@endsection

@section('content')
    <div class="card bulk-cate">
        <div class="card-header d-flex align-items-center">
            <h5>{{ __('static.media.dropzone') }}</h5>
            <div class="btn-popup ms-auto mb-0">
                <a href="{{ route('admin.media.index') }}" class="btn btn-primary">{{ __('static.media.back') }}</a>
            </div>
        </div>
        <div class="card-body mh-cls">
            {!! Form::open([
                'route' => 'admin.media.store',
                'method' => 'POST',
                'class' => 'dropzone digits',
                'files' => true,
            ]) !!}
            <div class="dz-message needsclick">
                <i class="fa fa-cloud-upload"></i>
                <h4 class="mb-0 f-w-600">{{ __('static.media.drop_message') }}</h4>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
