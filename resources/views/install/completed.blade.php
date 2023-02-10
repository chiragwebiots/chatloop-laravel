@extends('install.layouts.master')
@section('title', 'Installation Completed')
@section('content')
<div class="wizard-step-4 d-block">
    <div class="install-complete">
        <i data-feather="check-circle"></i>
        <h3>Chatloop installed successfully !</h3>
    </div>
    <div class="row goto-selection">
        <div class="col-sm-6">
            <a href="{{ route('login') }}">
                <div class="selection-box">
                    <i data-feather="airplay"></i>
                    <h5 class="mt-2">Go to your shop</h5>
                </div>
            </a>
        </div>
        <div class="col-sm-6">
            <a href="{{ route('login') }}">
                <div class="selection-box">
                    <i data-feather="settings"></i>
                    <h5 class="mt-2">Login to Administration</h5>
                </div>
            </a>
        </div>
    </div>
 </div>
@endsection