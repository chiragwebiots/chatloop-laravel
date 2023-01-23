@extends('admin.layouts.master')

@section('title', __('Pricing Plan'))

@section('breadcrumbs')
    <li class="breadcrumb-item active">{{ __('Pricing Plan') }}</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h5>{{ __('Pricing Plan') }}</h5>
            <div class="btn-popup ms-auto mb-0">
                <a href="{{ route('admin.pricing-plan.create') }}" class="btn btn-primary">{{ __('Create Plan') }}</a>
            </div>

            <a href="javascript:void(0);" class="btn btn-sm btn-danger deleteConfirmationBtn"
                style="display: none; margin-left: 8px;" data-url="{{ route('admin.delete.pricing-plan') }}">
                <i class="fa fa-trash">
                    <span id="count-selected-rows">0</span>
                </i>{{ __('static.delete_selected') }}
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
