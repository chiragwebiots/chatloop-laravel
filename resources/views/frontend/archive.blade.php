@extends('frontend.layouts.master')
@section('content')
    <div class="page-margin">
        <div class="breadcrumb-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 d-align-center">
                        <h2 class="title"><span>{{ $data->title }}</span></h2>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <nav class="theme-breadcrumb" aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                                <li class="breadcrumb-item active">{{ $data->title }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <section class="blog-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-lg-9 blog-sec">
                        <div class="row blog-list">
                            @forelse ($blogs as $blog)
                                <div class="col-lg-6 col-md-12">
                                    <div class="item news-slid">
                                        <a href="{{ route('blog.details', $blog->slug) }}">
                                            <div class="news-box">
                                                <img class="img-fluid"
                                                    src="{{ url(\App\Helpers\Helpers::media($blog->image)->url) }}"
                                                    alt="news-1">
                                            </div>
                                        </a>
                                        <div class="news-text">
                                            <div class="blog-hover">
                                                <h4>{{ $blog->title }}</h4>
                                                <ul class="list-inline blog-details-list">
                                                    <li><a
                                                            href="{{ route('blogs.author', strtolower($blog->createdBy->name)) }}">{{ $blog->createdBy->name }}</a>
                                                    </li>
                                                    <li><a
                                                            href="javascript:void(0)">{{ $blog->created_at->format('d M') }}</a>
                                                    </li>
                                                    <li><a href="javascript:void(0)">{{ __('25 comments') }}</a></li>
                                                    <li><a href="javascript:void(0)">{{ __('3 View') }}</a></li>
                                                </ul>
                                            </div>
                                            <p>{{ $blog->excerpt }}</p>
                                            <a class="btn-theme" href="{{ route('blog.details', $blog->slug) }}">View
                                                more</a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="row mt-5">
                                    <div class="w-50 mx-auto">
                                        <h3 class="text-secondary">Blogs not found!</h3>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3 order-md-first list-sidebar">
                        @include('frontend.layouts.partials.sidebar')
                    </div>
                </div>
            </div>
            <div class="animation-circle absolute"><i></i><i></i><i></i></div>
            <div class="animation-circle-inverse"><i></i><i></i><i></i></div>
        </section>
    </div>
@endsection
