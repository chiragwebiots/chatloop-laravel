<!-- Page Header Start-->
<div class="page-main-header">
    <div class="main-header-right row">
        <div class="main-header-left d-lg-none w-auto">
            <div class="logo-wrapper">
                <a href="<?php echo e(route('admin.dashboard')); ?>">
                    <img class="blur-up lazyloaded"
                        src="<?php echo e(isset($theme->site_logo) ? url(\App\Helpers\Helpers::media($theme->site_logo)->url) : asset('admin/images/logo.png')); ?>"
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
                        class="badge badge-pill badge-primary pull-right notification-badge">3</span><span
                        class="dot"></span>
                    <ul class="notification-dropdown onhover-show-div p-0">
                        <li>Notification <span class="badge badge-pill badge-primary pull-right">3</span></li>
                        <li>
                            <div class="media">
                                <div class="media-body">
                                    <h6 class="mt-0"><span><i class="shopping-color"
                                                data-feather="shopping-bag"></i></span>Your order ready for Ship..!</h6>
                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetuer.</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="media">
                                <div class="media-body">
                                    <h6 class="mt-0 txt-success"><span><i class="download-color font-success"
                                                data-feather="download"></i></span>Download Complete</h6>
                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetuer.</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="media">
                                <div class="media-body">
                                    <h6 class="mt-0 txt-danger"><span><i class="alert-color font-danger"
                                                data-feather="alert-circle"></i></span>250 MB trash files</h6>
                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetuer.</p>
                                </div>
                            </div>
                        </li>
                        <li class="txt-dark"><a href="#">All</a>notification</li>
                    </ul>
                </li>
                <li class="onhover-dropdown">
                    <div class="media align-items-center profile-box"><img
                            class="align-self-center profile-image pull-right img-fluid rounded-circle blur-up lazyloaded"
                            src="<?php echo e(Auth::user()->image ? url(\App\Helpers\Helpers::media(Auth::user()->image)->url) : asset('admin/images/user.png')); ?>"
                            alt="header-user">
                        <div class="dotted-animation"><span class="animate-circle"></span><span
                                class="main-circle"></span></div>
                    </div>
                    <ul class="profile-dropdown onhover-show-div p-20 profile-dropdown-hover">
                        <li><a href="<?php echo e(route('admin.account.profile')); ?>"><i
                                    data-feather="user"></i><?php echo e(__('Edit Profile')); ?></a></li>
                        <li>
                            <a href="<?php echo e(route('logout')); ?>"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i data-feather="log-out"></i><?php echo e(__('Logout')); ?>

                            </a>
                            <?php echo Form::open(['route' => 'logout', 'method' => 'POST', 'class' => 'd-none', 'id' => 'logout-form']); ?>

                            <?php echo Form::close(); ?>

                        </li>
                    </ul>
                </li>
            </ul>
            <div class="d-lg-none mobile-toggle pull-right"><i data-feather="more-horizontal"></i></div>
        </div>
    </div>
</div>
<!-- Page Header Ends -->
<?php /**PATH /home/webiots/Desktop/Git_hub/chat_loop_OPTIMIZE_CODE/chat_loop/resources/views/admin/layouts/partials/header.blade.php ENDPATH**/ ?>