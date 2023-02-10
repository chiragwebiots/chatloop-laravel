@extends('frontend.layouts.master')
@section('content')
    <div class="page-margin">
        <div class="breadcrumb-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 d-align-center">
                        <h2 class="title"><span>{{ $blog->title }}</span></h2>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <nav class="theme-breadcrumb" aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('blogs') }}">{{ __('Blogs') }}</a></li>
                                <li class="breadcrumb-item active">{{ $blog->title }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <section class="blog-page">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-8 col-lg-9">
                        <div class="blog-details news-slid">
                            <div class="news-box">
                                <img class="img-fluid" src="{{ url(\App\Helpers\Helpers::media($blog->image)->url) }}"
                                    alt="news-1">
                            </div>
                            <div class="news-text">
                                <div class="blog-hover">
                                    <h4>{{ $blog->title }}</h4>
                                    <ul class="list-inline blog-details-list">
                                        <li><a href="{{ route('blogs.author', strtolower($blog->createdBy->name)) }}">{{ $blog->createdBy->name }}
                                            </a>
                                        </li>
                                        <li><a href="javascript:void(0)">{{ $blog->created_at->format('d M') }}</a></li>
                                        <li><a href="javascript:void(0)">>{{ __('25 comments') }}</a></li>
                                        <li><a href="javascript:void(0)">{{ __('3 View') }}</a></li>
                                    </ul>
                                </div>
                                {!! $blog->content !!}
                            </div>
                        </div>
                    </div>
                    <div class="blog-divider"></div>
                    @if ($theme->required_login == true) 
                    <div class="col-md-10 offset-md-1 leave-coment">
                        <h3 class="text-center">Leave Your Comment</h3>
                        {!! Form::open([
                            'route' => 'blog.comment',
                            'method' => 'POST',
                            'class' => 'theme-form p-0 mt-3 form-show',
                            'enctype' => 'multipart/form-data',
                            ]) !!}
                        {!! Form::hidden('blog_id', $blog->id, ['class' => 'form-control']) !!}
                        @auth
                        {!! Form::hidden('user_id', auth()->user()->id, ['class' => 'form-control']) !!}
                        @endauth
                        {!! Form::hidden('parent_id', null, ['class' => 'form-control', 'id' => 'parent_id']) !!}
                        
                        @if ($theme->required_name_email == true)
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 md-fgrup-margin">
                                        {!! Form::text('name',auth()->user()->name ?? null, [
                                            'class' => 'form-control',
                                            'placeholder' => 'your name',
                                            ]) !!}
                                        @error('name')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong> {{ $message }} </strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        {!! Form::email('email',auth()->user()->email ?? null, [
                                            'class' => 'form-control',
                                            'placeholder' => 'your email',
                                            ]) !!}
                                        
                                        @error('email')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong> {{ $message }} </strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="form-group">
                                {!! Form::textarea('message', null, [
                                    'class' => 'form-control',
                                    'placeholder' => 'your message',
                                    'rows' => '6',
                                    'id' => 'message',
                                    ]) !!}
                            @error('message')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong> {{ $message }} </strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-button">
                            {!! Form::submit(__('static.save'), ['class' => 'btn btn-theme theme-color']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                    @endif  
                        <div class="col-12">
                            <ul class="comment-profile-list">
                                @forelse($comments as $comment)
                                <li>
                                    <div class="comment-profile-box">
                                        <div class="reply-box">
                                            <i class="fa fa-reply"></i>
                                            <a class="comment-reply" href="javascript:void(0)"
                                                id="{{ $comment->id }}"><span>Reply</span></a>
                                        </div>
                                        <div class="name-profile">
                                            <div class="profile-image">
                                                <img src="{{$comment->createdBy ? url(\App\Helpers\Helpers::media($comment->createdBy->image)->url) : asset('frontend/images/user-dummy-pic.png')}}"
                                                    class="img-fluid" alt="">    
                                            </div>
                                            <div class="profile-name">
                                                <h5> {{ $comment->name }} <span>
                                                        {{ $comment->created_at->diffForHumans() }} </span>
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="reply-content">
                                            {{ $comment->message }}
                                        </div>
                                    </div>
                                    @forelse ($comment->replies as $reply)
                                    @if($theme->comment_approved ? $theme->comment_approved && $reply->is_approved : true)
                                    <ul>
                                        <li>
                                            <div class="comment-profile-box">
                                                <div class="name-profile">
                                                    <div class="profile-image">
                                                        <img src="{{$reply->createdBy ? url(\App\Helpers\Helpers::media($reply->createdBy->image)->url) : asset('frontend/images/user-dummy-pic.png')}}"
                                                            class="img-fluid" alt="">
                                                    </div>
                                                    <div class="profile-name">
                                                        <h5>{{ $reply->name }}<span>{{ $comment->created_at->diffForHumans() }}</span></h5>
                                                    </div>
                                                </div>
                                                <div class="reply-content">
                                                    <p> {{ $reply->message }} </p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    @endif
                                    @empty
                                    
                                    @endforelse 
                                </li>
                                @empty
                                    
                                @endforelse
                            </ul>
                        </div>
                    <div class="col-md-4 col-lg-3 order-md-first list-sidebar">
                        @include('frontend.layouts.partials.sidebar')
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
