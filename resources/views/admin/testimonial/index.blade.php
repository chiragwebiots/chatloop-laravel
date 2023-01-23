@extends('admin.layouts.master')

@section('title', __('Testimonials'))

@section('breadcrumbs')
    <li class="breadcrumb-item active">{{ __('Testimonials') }}</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h5>{{ __('Testimonials') }}</h5>
            @can('admin.testimonial.create')
                <div class="btn-popup ms-auto mb-0">
                    <a href="{{ route('admin.testimonial.create') }}" class="btn btn-primary">{{ __('Create Testimonial') }}</a>
                </div>
            @endcan
        </div>
        <div class="card-body">
            {!! $dataTable->table() !!}
        </div>
    </div>
@endsection

@push('js')
    {!! $dataTable->scripts() !!}
@endpush
