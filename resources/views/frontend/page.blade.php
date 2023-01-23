@extends('frontend.layouts.master')
@section('content')
    <div class="page-margin">
        <div class="breadcrumb-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 d-align-center">
                        <h2 class="title"><span>{{ $page->title }}</span></h2>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <nav class="theme-breadcrumb" aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}">{{ __('Home') }}</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    {{ $page->title }}
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        {!! $page->content !!}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
