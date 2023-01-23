@extends('admin.layouts.master')

@section('title', __('Categories'))

@section('breadcrumbs')
    <li class="breadcrumb-item active">{{ __('Categories') }}</li>
@endsection

@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/vendors/tree.css') }}">
@endpush

@section('content')
    <div class="row">
        @can('admin.category.index')
            <div class="col-sm-4">
                @include('admin.category.tree', [
                    'categories' => $categories->all(),
                    'cat' => isset($cat) ? $cat : null,
                ])
            </div>
        @endcan
        @can('admin.category.create')
            <div class="col-sm-8">
                <div class="card tab2-card">
                    <div class="card-header">
                        <h5>{{ __('Create Category') }}</h5>
                    </div>
                    {!! Form::open(['route' => 'admin.category.store', 'method' => 'POST', 'class' => 'needs-validation']) !!}
                    <div class="card-body">
                        @include('admin.category.fields')
                    </div>
                    <div class="card-footer">
                        {!! Form::submit(__('static.save'), ['class' => 'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        @endcan
    </div>
@endsection
@push('js')
    <script src="{{ asset('admin/js/jstree.min.js') }}"></script>
    <script src="{{ asset('admin/js/tree.js') }}"></script>
@endpush
