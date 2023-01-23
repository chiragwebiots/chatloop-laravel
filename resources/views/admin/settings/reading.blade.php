@extends('admin.layouts.master')

@section('title', __('Reading Settings'))

@section('breadcrumbs')
    <li class="breadcrumb-item active">{{ __('Settings') }}</li>
    <li class="breadcrumb-item active">{{ __('Reading Settings') }}</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card tab2-card">
                <div class="card-header">
                    <h5>{{ __('Reading Settings') }}</h5>
                </div>
                {!! Form::open([
                    'route' => 'admin.setting.update',
                    'method' => 'PUT',
                    'class' => 'needs-validation user-add',
                ]) !!}

                <div class="card-body">
                    <div class="form-group row">
                        {!! Form::label('display_homepage', __('Your homepage displays'), ['class' => 'col-xl-3 col-md-4']) !!}

                        <div class="col-xl-8 col-md-7">
                            <div class="form-group m-checkbox-inline mb-0 custom-radio-ml d-flex radio-animated">
                                <label class="d-block" for="post">
                                    {!! Form::radio('display_homepage', 'post', @$setting->display_homepage == 'post' ? true : false, [
                                        'class' => 'radio_animated select_home_page',
                                        'id' => 'post',
                                    ]) !!}
                                    {{ __('Your latest posts') }}
                                </label>
                                <label class="d-block" for="page">
                                    {!! Form::radio('display_homepage', 'page', @$setting->display_homepage == 'page' ? true : false, [
                                        'class' => 'radio_animated select_home_page',
                                        'id' => 'page',
                                    ]) !!}
                                    {{ __('A static page (select below)') }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('homepage', __('Home Page'), ['class' => 'col-xl-3 col-md-4']) !!}
                        <div class="col-xl-8 col-md-7">
                            {{ Form::select('homepage', $pages, @$setting->homepage, ['class' => 'form-control select-2', 'placeholder' => 'Select Home Page', 'disabled' => @$setting->display_homepage == 'page' ? false : true]) }}
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('postpage', __('Post Page'), ['class' => 'col-xl-3 col-md-4']) !!}
                        <div class="col-xl-8 col-md-7">
                            {{ Form::select('postpage', $pages, @$setting->postpage, ['class' => 'form-control select-2', 'placeholder' => 'Select Posts Page', 'disabled' => @$setting->display_homepage == 'page' ? false : true]) }}
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('post_show', __('Blog pages show at most'), ['class' => 'col-xl-3 col-md-4']) !!}
                        <div class="col-xl-8 col-md-7">
                            {!! Form::number('post_show', @$setting->post_show, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    {!! Form::submit(__('static.save'), ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
