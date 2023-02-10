<!-- Page Sidebar Start-->
<div class="page-sidebar">
    <div class="main-header-left d-none d-lg-block">
        <div class="logo-wrapper">
            <a href="{{ route('admin.dashboard') }}">
                <img class="blur-up lazyloaded img-fluid"
                    src="{{ isset($theme->site_logo) ? url(\App\Helpers\Helpers::media($theme->site_logo)->url) : asset('admin/images/logo.png') }}"
                    alt="">
            </a>
        </div>
    </div>
    <div class="sidebar custom-scrollbar">
        <div class="sidebar-user text-center">
            <div>
                <img class="img-wh-60 rounded-circle lazyloaded blur-up"
                    src="{{ Auth::user()->image ? url(\App\Helpers\Helpers::media(Auth::user()->image)->url) : asset('admin/images/user.png') }}"
                    alt="profile">
            </div>
            <h6 class="mt-3 f-14">{{ Auth::user()->name }}</h6>
            <p>{{ Auth::user()->getRoleNames()->first() }}</p>
        </div>
        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('admin.dashboard') }}"
                    class="sidebar-header {{ Request::is('admin/dashboard*') ? 'active' : '' }}">
                    <i data-feather="home"></i><span>{{ __('static.dashboard') }}</span>
                </a>
            </li>
            @can('admin.role.index')
                <li>
                    <a href="javascript:void(0);" class="sidebar-header">
                        <i data-feather="user-check"></i><span>{{ __('static.roles.roles') }}</span><i
                            class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu {{ Request::is('admin/role*') ? 'menu-open' : '' }}">
                        <li>
                            <a href="{{ route('admin.role.index') }}"
                                class="{{ Request::is('admin/role*') && !Request::is('admin/role/create') ? 'active' : '' }}">
                                <i class="fa fa-circle"></i>{{ __('static.roles.roles') }}
                            </a>
                        </li>
                        @can('admin.role.create')
                            <li>
                                <a href="{{ route('admin.role.create') }}"
                                    class="{{ Request::is('admin/role/create') ? 'active' : '' }}">
                                    <i class="fa fa-circle"></i>{{ __('Add New') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('admin.user.index')
                <li>
                    <a href="javascript:void(0);" class="sidebar-header">
                        <i data-feather="users"></i><span>{{ __('static.users.users') }}</span><i
                            class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul
                        class="sidebar-submenu {{ Request::is('admin/user*') || Request::is('admin/account/profile') ? 'menu-open' : '' }}">
                        <li>
                            <a href="{{ route('admin.user.index') }}"
                                class="{{ Request::is('admin/user*') && !Request::is('admin/user/create') ? 'active' : '' }}">
                                <i class="fa fa-circle"></i>{{ __('All Users') }}
                            </a>
                        </li>
                        @can('admin.user.create')
                            <li>
                                <a href="{{ route('admin.user.create') }}"
                                    class="{{ Request::is('admin/user/create') ? 'active' : '' }}">
                                    <i class="fa fa-circle"></i>{{ __('Add New') }}
                                </a>
                            </li>
                        @endcan
                        <li>
                            <a href="{{ route('admin.account.profile') }}"
                                class="{{ Request::is('admin/account/profile') ? 'active' : '' }}">
                                <i class="fa fa-circle"></i>{{ __('Profile') }}
                            </a>
                        </li>
                    </ul>
                </li>
            @endcan
            @can('admin.media.index')
                <li>
                    <a href="{{ route('admin.media.index') }}"
                        class="sidebar-header {{ Request::is('admin/media*') ? 'active' : '' }}">
                        <i data-feather="camera"></i><span>{{ __('static.media.media') }}</span>
                    </a>
                </li>
            @endcan
            @can('admin.blog.index')
                <li>
                    <a href="javascript:void(0);" class="sidebar-header">
                        <i data-feather="edit"></i><span>{{ __('Posts') }}</span><i
                            class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu {{ Request::is('admin/blog*') || Request::is('admin/category*')||Request::is('admin/comment*') || Request::is('admin/tag*') ? 'menu-open' : '' }}">
                        <li>
                            <a href="{{ route('admin.blog.index') }}"
                                class="{{ Request::is('admin/blog*') && !Request::is('admin/blog/create') ? 'active' : '' }}">
                                <i class="fa fa-circle"></i>{{ __('All Posts') }}
                            </a>
                        </li>
                        @can('admin.blog.create')
                            <li>
                                <a href="{{ route('admin.blog.create') }}"
                                    class="{{ Request::is('admin/blog/create') ? 'active' : '' }}">
                                    <i class="fa fa-circle"></i>{{ __('Add New') }}
                                </a>
                            </li>
                        @endcan
                        @can('admin.category.index')
                            <li>
                                <a href="{{ route('admin.category.index') }}"
                                    class="{{ Request::is('admin/category*') ? 'active' : '' }}">
                                    <i class="fa fa-circle"></i>{{ __('Categories') }}
                                </a>
                            </li>
                        @endcan
                        @can('admin.comment.index')
                            <li>
                                <a href="{{ route('admin.comment.index') }}"
                                    class="{{ Request::is('admin/comment*') ? 'active' : '' }}">
                                    <i class="fa fa-circle"></i>{{ __('Comments') }}
                                </a>
                            </li>
                        @endcan
                        @can('admin.tag.index')
                            <li>
                                <a href="{{ route('admin.tag.index') }}"
                                    class="{{ Request::is('admin/tag*') ? 'active' : '' }}">
                                    <i class="fa fa-circle"></i>{{ __('Tags') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('admin.page.index')
                <li>
                    <a href="javascript:void(0);" class="sidebar-header">
                        <i data-feather="layout"></i><span>{{ __('static.pages.pages') }}</span><i
                            class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu {{ Request::is('admin/page*') ? 'menu-open' : '' }}">
                        <li>
                            <a href="{{ route('admin.page.index') }}"
                                class="{{ Request::is('admin/page*') && !Request::is('admin/page/create') ? 'active' : '' }}">
                                <i class="fa fa-circle"></i>{{ __('All Pages') }}
                            </a>
                        </li>
                        @can('admin.page.create')
                            <li>
                                <a href="{{ route('admin.page.create') }}"
                                    class="{{ Request::is('admin/page/create') ? 'active' : '' }}">
                                    <i class="fa fa-circle"></i>{{ __('Add New') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('admin.team.index')
                <li>
                    <a href="{{ route('admin.team.index') }}"
                        class="sidebar-header {{ Request::is('admin/team*') ? 'active' : '' }}">
                        <i data-feather="briefcase"></i><span>{{ __('Team') }}</span>
                    </a>
                </li>
            @endcan
            @can('admin.pricing-plan.index')
                <li>
                    <a href="{{ route('admin.pricing-plan.index') }}"
                        class="sidebar-header {{ Request::is('admin/pricing-plan*') ? 'active' : '' }}">
                        <i data-feather="send"></i><span>{{ __('Pricing Plan') }}</span>
                    </a>
                </li>
            @endcan
            @can('admin.testimonial.index')
                <li>
                    <a href="{{ route('admin.testimonial.index') }}"
                        class="sidebar-header {{ Request::is('admin/testimonial*') ? 'active' : '' }}">
                        <i data-feather="user"></i><span>{{ __('Testimonials') }}</span>
                    </a>
                </li>
            @endcan
            @can('admin.faq.index')
                <li>
                    <a href="{{ route('admin.faq.index') }}"
                        class="sidebar-header {{ Request::is('admin/faq*') ? 'active' : '' }}">
                        <i data-feather="send"></i><span>{{ __('FAQ\'s') }}</span>
                    </a>
                </li>
            @endcan
            @can('admin.section.index')
                <li>
                    <a href="javascript:void(0);" class="sidebar-header">
                        <i data-feather="home"></i><span>{{ __('Sections') }}</span><i
                            class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu {{ Request::is('admin/section*') ? 'menu-open' : '' }}">
                        <li>
                            <a href="{{ route('admin.section.index', 'home') }}"
                                class="{{ Request::is('admin/section/home') ? 'active' : '' }}">
                                <i class="fa fa-circle"></i>{{ __('Home Banner') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.section.index', 'about') }}"
                                class="{{ Request::is('admin/section/about') ? 'active' : '' }}">
                                <i class="fa fa-circle"></i>{{ __('About') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.section.index', 'feature') }}"
                                class="{{ Request::is('admin/section/feature') ? 'active' : '' }}">
                                <i class="fa fa-circle"></i>{{ __('App Features') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.section.index', 'how-it-work') }}"
                                class="{{ Request::is('admin/section/how-it-work') ? 'active' : '' }}">
                                <i class="fa fa-circle"></i>{{ __('How It Work') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.section.index', 'screenshots') }}"
                                class="{{ Request::is('admin/section/screenshots') ? 'active' : '' }}">
                                <i class="fa fa-circle"></i>{{ __('Screenshots') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.section.index', 'team') }}"
                                class="{{ Request::is('admin/section/team') ? 'active' : '' }}">
                                <i class="fa fa-circle"></i>{{ __('Team') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.section.index', 'pricing-plan') }}"
                                class="{{ Request::is('admin/section/pricing-plan') ? 'active' : '' }}">
                                <i class="fa fa-circle"></i>{{ __('Pricing Plans') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.section.index', 'testimonial') }}"
                                class="{{ Request::is('admin/section/testimonial') ? 'active' : '' }}">
                                <i class="fa fa-circle"></i>{{ __('Testimonials') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.section.index', 'faq') }}"
                                class="{{ Request::is('admin/section/faq') ? 'active' : '' }}">
                                <i class="fa fa-circle"></i>{{ __('FAQ\'s') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.section.index', 'recent-blog') }}"
                                class="{{ Request::is('admin/section/recent-blog') ? 'active' : '' }}">
                                <i class="fa fa-circle"></i>{{ __('Recent Blogs') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.section.index', 'download') }}"
                                class="{{ Request::is('admin/section/download') ? 'active' : '' }}">
                                <i class="fa fa-circle"></i>{{ __('Download') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.section.index', 'contact') }}"
                                class="{{ Request::is('admin/section/contact') ? 'active' : '' }}">
                                <i class="fa fa-circle"></i>{{ __('Contact') }}
                            </a>
                        </li>
                    </ul>
                </li>
            @endcan
            <li>
                <a href="javascript:void(0);" class="sidebar-header">
                    <i data-feather="sliders"></i><span>{{ __('Settings') }}</span><i
                        class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="sidebar-submenu {{ Request::is('admin/setting*') ? 'menu-open' : '' }}">
                    <li>
                        <a href="{{ route('admin.setting.index', 'general') }}"
                            class="{{ Request::is('admin/setting/general') ? 'active' : '' }}">
                            <i class="fa fa-circle"></i>{{ __('General') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.setting.index', 'smtp') }}"
                            class="{{ Request::is('admin/setting/smtp') ? 'active' : '' }}">
                            <i class="fa fa-circle"></i>{{ __('SMTP Setting') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.setting.index', 'reading') }}"
                            class="{{ Request::is('admin/setting/reading') ? 'active' : '' }}">
                            <i class="fa fa-circle"></i>{{ __('Reading') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.setting.index', 'permalinks') }}"
                            class="{{ Request::is('admin/setting/permalinks') ? 'active' : '' }}">
                            <i class="fa fa-circle"></i>{{ __('Permalinks') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.setting.index', 'analytics') }}"
                            class="{{ Request::is('admin/setting/analytics') ? 'active' : '' }}">
                            <i class="fa fa-circle"></i>{{ __('Analytics') }}
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="sidebar-header">
                    <i data-feather="settings"></i><span>{{ __('Theme Options') }}</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul
                    class="sidebar-submenu {{ Request::is('admin/themes*') || Request::is('admin/social-links*') ? 'menu-open' : '' }}">
                    <li>
                        <a href="{{ route('admin.theme.index', 'appearance') }}"
                            class="{{ Request::is('admin/themes/appearance') ? 'active' : '' }}">
                            <i class="fa fa-circle"></i>{{ __('static.appearance') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.theme.index', 'seo') }}"
                            class="{{ Request::is('admin/themes/seo') ? 'active' : '' }}">
                            <i class="fa fa-circle"></i>{{ __('static.seo') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.theme.index', 'comments-settings') }}"
                            class="{{ Request::is('admin/themes/comments-settings') ? 'active' : '' }}">
                            <i class="fa fa-circle"></i>{{ __('static.comment') }}
                        </a>
                    </li>
                    {{-- <li>
                        <a href="{{ route('admin.social-links.index', 'social-links') }}"
                            class="{{ Request::is('admin/social-links') ? 'active' : '' }}">
                            <i class="fa fa-circle"></i>{{ __('static.social_link') }}
                        </a>
                    </li> --}}


                    <li>
                        <a href="{{ route('admin.social-links.index') }}"
                            class="{{ Request::is('admin/social-links*') ? 'active' : '' }}">
                            <i class="fa fa-circle"></i><span>{{ __('static.social_link') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('admin.clear-cache') }}" class="sidebar-header">
                    <i data-feather="feather"></i><span>{{ __('Clear Cache') }}</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- Page Sidebar End -->
