@extends('frontend.layouts.master')
@section('content')
    @isset($page->content)
        {!! $page->content !!}
    @endisset
@endsection
