@extends('admin.layouts.master')

@section('title', __('static.social_link'))

@section('breadcrumbs')
    <li class="breadcrumb-item active">{{ __('static.theme_option') }}</li>
    <li class="breadcrumb-item active">{{ __('static.social_link') }}</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h5>{{ __('static.social_link') }}</h5>
            <div class="btn-popup ms-auto mb-0">
                <a href="{{ route('admin.social-links.create') }}"
                    class="btn btn-primary">{{ __('static.social_links.create') }}</a>
            </div>
        </div>
        <div class="card-body">
            {!! $dataTable->table() !!}
        </div>
    </div>
@endsection

@push('js')
    {!! $dataTable->scripts() !!}
@endpush
