@extends('auth.master')

@section('title', __('Login'))

@section('content')

    <section class="auth-page">
        <div class="animation-circle-inverse"><i></i><i></i><i></i></div>
        <div class="animation-circle"><i></i><i></i><i></i></div>
        <div class="auth-card">
            <div class="text-center">
                <h2>{{ __('Sign In') }}</h2>
                <div class="line"></div>
                <p>{{ __('Welcome To chatloop, Please Sign in With Your Personal Account Information.') }}</p>
            </div>
            <div class="main">
                {!! Form::open(['route' => 'login', 'method' => 'POST', 'class' => 'auth-form']) !!}
                <div class="form-group">
                    {!! Form::label('email', __('static.e-mail_address')) !!}<i class="fa fa-envelope-o"></i>
                    {!! Form::email('email', old('email'), [
                        'class' => 'form-control',
                        'placeholder' => __('static.e-mail_address'),
                    ]) !!}
                    @error('email')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('password', __('static.password')) !!}<i class="fa fa-lock"></i>
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => __('static.password')]) !!}
                    @error('password')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                            class="btn btn-default forgot-pass">{{ __('Forgot ?') }}</a>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::submit(__('Sign in'), ['class' => 'btn submit']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </section>

@endsection
