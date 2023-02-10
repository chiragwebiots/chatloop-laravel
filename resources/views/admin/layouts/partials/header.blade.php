<!-- Page Header Start-->
<div class="page-main-header">
    <div class="main-header-right row">
        <div class="main-header-left d-lg-none w-auto">
            <div class="logo-wrapper">
                <a href="{{ route('admin.dashboard') }}">
                    <img class="blur-up lazyloaded"
                        src="{{ is_null(!$theme->site_logo) ? url(\App\Helpers\Helpers::media($theme->site_logo)->url) : asset('admin/images/logo.png') }}"
                        alt="">
                </a>
            </div>
        </div>
        <div class="mobile-sidebar w-auto">
            <div class="media-body text-end switch-sm">
                <label class="switch">
                    <a href="javascript:void(0)">
                        <i id="sidebar-toggle" data-feather="align-left"></i>
                    </a>
                </label>
            </div>
        </div>
        <div class="nav-right col">
            <ul class="nav-menus">
                <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i
                            data-feather="maximize-2"></i></a></li>
                <li class="onhover-dropdown"><a class="txt-dark" href="#">
                        <h6>EN</h6>
                    </a>
                    <ul class="language-dropdown onhover-show-div p-20">
                        <li><a href="#" data-lng="en"><i class="flag-icon flag-icon-is"></i>English</a></li>
                        <li><a href="#" data-lng="es"><i class="flag-icon flag-icon-um"></i>Spanish</a></li>
                        <li><a href="#" data-lng="pt"><i class="flag-icon flag-icon-uy"></i>Portuguese</a></li>
                        <li><a href="#" data-lng="fr"><i class="flag-icon flag-icon-nz"></i>French</a></li>
                    </ul>
                </li>
                <li class="onhover-dropdown"><i data-feather="bell"></i><span
                        class="badge badge-pill badge-primary pull-right notification-badge">{{count($contact)}}</span><span
                        class="dot"></span>
                    <ul class="notification-dropdown onhover-show-div p-0">
                        <li>Contact Emails<span class="badge badge-pill badge-primary pull-right">{{count($contact)}}</span></li>
                        <li>
                            <div class="media">
                                <div class="media-body">
                                    @forelse ($contact as $contact)
                                        <h6 class="mt-0"><span><i class="shopping-color"
                                                    data-feather="shopping-bag"></i></span> You got email from
                                            {{ $contact->name }} </h6>
                                        <p class="mb-0">{{ $contact->message }}</p>
                                    @empty
                                        <h3>Contact Emails Not Found</h3>
                                    @endforelse
                                </div>
                            </div>
                        </li>
                        <li class="txt-dark"><a href="https://mail.google.com/mail/u/0/#inbox">All</a> Emails</li>
                    </ul>
                </li>
                <li class="onhover-dropdown">
                    <div class="media align-items-center profile-box"><img
                            class="align-self-center profile-image pull-right img-fluid rounded-circle blur-up lazyloaded"
                            src="{{ Auth::user()->image ? url(\App\Helpers\Helpers::media(Auth::user()->image)->url) : asset('admin/images/user.png') }}"
                            alt="header-user">
                        <div class="dotted-animation"><span class="animate-circle"></span><span
                                class="main-circle"></span></div>
                    </div>
                    <ul class="profile-dropdown onhover-show-div p-20 profile-dropdown-hover">
                        <li><a href="{{ route('admin.account.profile') }}"><i
                                    data-feather="user"></i>{{ __('Edit Profile') }}</a></li>
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i data-feather="log-out"></i>{{ __('Logout') }}
                            </a>
                            {!! Form::open(['route' => 'logout', 'method' => 'POST', 'class' => 'd-none', 'id' => 'logout-form']) !!}
                            {!! Form::close() !!}
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="d-lg-none mobile-toggle pull-right"><i data-feather="more-horizontal"></i></div>
        </div>
    </div>
</div>
<!-- Page Header Ends -->
