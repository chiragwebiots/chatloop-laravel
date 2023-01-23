@extends('admin.layouts.master')

@section('title', __('Tags'))

@section('breadcrumbs')
    <li class="breadcrumb-item active">{{ __('Tags') }}</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h5>{{ __('Tags') }}</h5>
            @can('admin.tag.create')
                <div class="btn-popup ms-auto mb-0">
                    <a href="{{ route('admin.tag.create') }}" class="btn btn-primary">{{ __('Create Tag') }}</a>
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
