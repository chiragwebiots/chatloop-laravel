@extends('admin.layouts.master')

@section('title', __('static.roles.roles'))

@section('breadcrumbs')
    <li class="breadcrumb-item active">{{ __('static.roles.roles') }}</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h5>{{ __('static.roles.roles') }}</h5>
            @can('admin.role.create')
                <div class="btn-popup ms-auto mb-0">
                    <a href="{{ route('admin.role.create') }}" class="btn btn-primary">{{ __('static.roles.create') }}</a>
                </div>
            @endcan
            <a href="javascript:void(0);" class="btn btn-sm btn-danger deleteConfirmationBtn"
                style="display: none; margin-left: 8px;" data-url="{{ route('admin.delete.roles') }}">
                <i class="fa fa-trash">
                    <span id="count-selected-rows">0</span>
                </i> Delete Selected
            </a>
        </div>
        <div class="card-body">
            {!! $dataTable->table() !!}
        </div>
    </div>
@endsection

@push('js')
    {!! $dataTable->scripts() !!}
@endpush
