@extends('admin.layouts.master')

@section('title', __('static.media.media'))

@section('breadcrumbs')
    <li class="breadcrumb-item active">{{ __('static.media.media') }}</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h5>{{ __('static.media.files') }}</h5>
            @can('admin.media.create')
                <div class="btn-popup ms-auto mb-0">
                    <a href="{{ route('admin.media.create') }}" class="btn btn-primary">{{ __('static.media.upload') }}</a>
                </div>
            @endcan
        </div>
        <div class="card-body">
            <div class="row upload-card">
                @forelse($files as $file)
                    <div class="col-2">
                        <div class="card ratio3_2 b_size_content">
                            <div class="img-part bg-size-contain">
                                <img src="{{ asset($file->url) }}" class="card-img-top bg-img" alt="...">
                                <div class="overlay-copy">
                                    <a href="{{ asset($file->url) }}" download>
                                        <i class="fa fa-download me-2" aria-hidden="true"></i>{{ __('static.download') }}
                                    </a>
                                </div>
                            </div>
                            @can('delete', $file)
                                <div class="dropdown custom-dropdown">
                                    @includeIf('admin.inc.action', [
                                        'delete' => 'admin.media.destroy',
                                        'data' => $file,
                                    ])
                                </div>
                            @endcan
                            <div class="card-body">
                                <h5 class="card-title mb-0">{{ $file->original_file_name }}</h5>
                                <h6>{{ $file->size }} {{ __('KB') }}</h6>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>{{ __('No Files') }}</p>
                @endforelse
            </div>

        </div>
    </div>
@endsection
