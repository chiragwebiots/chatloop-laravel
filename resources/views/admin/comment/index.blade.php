@extends('admin.layouts.master')

@section('title', __('Comment'))

@section('breadcrumbs')
    <li class="breadcrumb-item active">{{ __('Comment') }}</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h5>{{ __('Comment') }}</h5>
        </div>
        <div class="card-body">
            {!! $dataTable->table() !!}
        </div>
    </div>
@endsection

@push('js')
    {!! $dataTable->scripts() !!}
@endpush
