@extends('admin.layouts.master')

@section('title', __('FAQ\'s'))

@section('breadcrumbs')
    <li class="breadcrumb-item active">{{ __('FAQ\'s') }}</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h5>{{ __('FAQ\'s') }}</h5>
            <div class="btn-popup ms-auto mb-0">
                <a href="{{ route('admin.faq.create') }}" class="btn btn-primary">{{ __('Create FAQ') }}</a>
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
