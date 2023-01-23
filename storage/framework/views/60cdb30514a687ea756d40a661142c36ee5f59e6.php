<!-- Page Sidebar Start-->
<div class="page-sidebar">
    <div class="main-header-left d-none d-lg-block">
        <div class="logo-wrapper">
            <a href="<?php echo e(route('admin.dashboard')); ?>">
                <img class="blur-up lazyloaded img-fluid"
                    src="<?php echo e(isset($theme->site_logo) ? url(\App\Helpers\Helpers::media($theme->site_logo)->url) : asset('admin/images/logo.png')); ?>"
                    alt="">
            </a>
        </div>
    </div>
    <div class="sidebar custom-scrollbar">
        <div class="sidebar-user text-center">
            <div>
                <img class="img-wh-60 rounded-circle lazyloaded blur-up"
                    src="<?php echo e(Auth::user()->image ? url(\App\Helpers\Helpers::media(Auth::user()->image)->url) : asset('admin/images/user.png')); ?>"
                    alt="profile">
            </div>
            <h6 class="mt-3 f-14"><?php echo e(Auth::user()->name); ?></h6>
            <p><?php echo e(Auth::user()->getRoleNames()->first()); ?></p>
        </div>
        <ul class="sidebar-menu">
            <li>
                <a href="<?php echo e(route('admin.dashboard')); ?>"
                    class="sidebar-header <?php echo e(Request::is('admin/dashboard*') ? 'active' : ''); ?>">
                    <i data-feather="home"></i><span><?php echo e(__('static.dashboard')); ?></span>
                </a>
            </li>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.role.index')): ?>
                <li>
                    <a href="javascript:void(0);" class="sidebar-header">
                        <i data-feather="user-check"></i><span><?php echo e(__('static.roles.roles')); ?></span><i
                            class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu <?php echo e(Request::is('admin/role*') ? 'menu-open' : ''); ?>">
                        <li>
                            <a href="<?php echo e(route('admin.role.index')); ?>"
                                class="<?php echo e(Request::is('admin/role*') && !Request::is('admin/role/create') ? 'active' : ''); ?>">
                                <i class="fa fa-circle"></i><?php echo e(__('static.roles.roles')); ?>

                            </a>
                        </li>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.role.create')): ?>
                            <li>
                                <a href="<?php echo e(route('admin.role.create')); ?>"
                                    class="<?php echo e(Request::is('admin/role/create') ? 'active' : ''); ?>">
                                    <i class="fa fa-circle"></i><?php echo e(__('Add New')); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.user.index')): ?>
                <li>
                    <a href="javascript:void(0);" class="sidebar-header">
                        <i data-feather="users"></i><span><?php echo e(__('static.users.users')); ?></span><i
                            class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul
                        class="sidebar-submenu <?php echo e(Request::is('admin/user*') || Request::is('admin/account/profile') ? 'menu-open' : ''); ?>">
                        <li>
                            <a href="<?php echo e(route('admin.user.index')); ?>"
                                class="<?php echo e(Request::is('admin/user*') && !Request::is('admin/user/create') ? 'active' : ''); ?>">
                                <i class="fa fa-circle"></i><?php echo e(__('All Users')); ?>

                            </a>
                        </li>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.user.create')): ?>
                            <li>
                                <a href="<?php echo e(route('admin.user.create')); ?>"
                                    class="<?php echo e(Request::is('admin/user/create') ? 'active' : ''); ?>">
                                    <i class="fa fa-circle"></i><?php echo e(__('Add New')); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                        <li>
                            <a href="<?php echo e(route('admin.account.profile')); ?>"
                                class="<?php echo e(Request::is('admin/account/profile') ? 'active' : ''); ?>">
                                <i class="fa fa-circle"></i><?php echo e(__('Profile')); ?>

                            </a>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.media.index')): ?>
                <li>
                    <a href="<?php echo e(route('admin.media.index')); ?>"
                        class="sidebar-header <?php echo e(Request::is('admin/media*') ? 'active' : ''); ?>">
                        <i data-feather="camera"></i><span><?php echo e(__('static.media.media')); ?></span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.blog.index')): ?>
                <li>
                    <a href="javascript:void(0);" class="sidebar-header">
                        <i data-feather="edit"></i><span><?php echo e(__('Posts')); ?></span><i
                            class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul
                        class="sidebar-submenu <?php echo e(Request::is('admin/blog*') || Request::is('admin/category*') || Request::is('admin/tag*') ? 'menu-open' : ''); ?>">
                        <li>
                            <a href="<?php echo e(route('admin.blog.index')); ?>"
                                class="<?php echo e(Request::is('admin/blog*') && !Request::is('admin/blog/create') ? 'active' : ''); ?>">
                                <i class="fa fa-circle"></i><?php echo e(__('All Posts')); ?>

                            </a>
                        </li>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.blog.create')): ?>
                            <li>
                                <a href="<?php echo e(route('admin.blog.create')); ?>"
                                    class="<?php echo e(Request::is('admin/blog/create') ? 'active' : ''); ?>">
                                    <i class="fa fa-circle"></i><?php echo e(__('Add New')); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.category.index')): ?>
                            <li>
                                <a href="<?php echo e(route('admin.category.index')); ?>"
                                    class="<?php echo e(Request::is('admin/category*') ? 'active' : ''); ?>">
                                    <i class="fa fa-circle"></i><?php echo e(__('Categories')); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.tag.index')): ?>
                            <li>
                                <a href="<?php echo e(route('admin.tag.index')); ?>"
                                    class="<?php echo e(Request::is('admin/tag*') ? 'active' : ''); ?>">
                                    <i class="fa fa-circle"></i><?php echo e(__('Tags')); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.page.index')): ?>
                <li>
                    <a href="javascript:void(0);" class="sidebar-header">
                        <i data-feather="layout"></i><span><?php echo e(__('static.pages.pages')); ?></span><i
                            class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu <?php echo e(Request::is('admin/page*') ? 'menu-open' : ''); ?>">
                        <li>
                            <a href="<?php echo e(route('admin.page.index')); ?>"
                                class="<?php echo e(Request::is('admin/page*') && !Request::is('admin/page/create') ? 'active' : ''); ?>">
                                <i class="fa fa-circle"></i><?php echo e(__('All Pages')); ?>

                            </a>
                        </li>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.page.create')): ?>
                            <li>
                                <a href="<?php echo e(route('admin.page.create')); ?>"
                                    class="<?php echo e(Request::is('admin/page/create') ? 'active' : ''); ?>">
                                    <i class="fa fa-circle"></i><?php echo e(__('Add New')); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.team.index')): ?>
                <li>
                    <a href="<?php echo e(route('admin.team.index')); ?>"
                        class="sidebar-header <?php echo e(Request::is('admin/team*') ? 'active' : ''); ?>">
                        <i data-feather="briefcase"></i><span><?php echo e(__('Team')); ?></span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.pricing-plan.index')): ?>
                <li>
                    <a href="<?php echo e(route('admin.pricing-plan.index')); ?>"
                        class="sidebar-header <?php echo e(Request::is('admin/pricing-plan*') ? 'active' : ''); ?>">
                        <i data-feather="send"></i><span><?php echo e(__('Pricing Plan')); ?></span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.testimonial.index')): ?>
                <li>
                    <a href="<?php echo e(route('admin.testimonial.index')); ?>"
                        class="sidebar-header <?php echo e(Request::is('admin/testimonial*') ? 'active' : ''); ?>">
                        <i data-feather="user"></i><span><?php echo e(__('Testimonials')); ?></span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.faq.index')): ?>
                <li>
                    <a href="<?php echo e(route('admin.faq.index')); ?>"
                        class="sidebar-header <?php echo e(Request::is('admin/faq*') ? 'active' : ''); ?>">
                        <i data-feather="send"></i><span><?php echo e(__('FAQ\'s')); ?></span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.section.index')): ?>
                <li>
                    <a href="javascript:void(0);" class="sidebar-header">
                        <i data-feather="home"></i><span><?php echo e(__('Sections')); ?></span><i
                            class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="sidebar-submenu <?php echo e(Request::is('admin/section*') ? 'menu-open' : ''); ?>">
                        <li>
                            <a href="<?php echo e(route('admin.section.index', 'home')); ?>"
                                class="<?php echo e(Request::is('admin/section/home') ? 'active' : ''); ?>">
                                <i class="fa fa-circle"></i><?php echo e(__('Home Banner')); ?>

                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('admin.section.index', 'about')); ?>"
                                class="<?php echo e(Request::is('admin/section/about') ? 'active' : ''); ?>">
                                <i class="fa fa-circle"></i><?php echo e(__('About')); ?>

                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('admin.section.index', 'feature')); ?>"
                                class="<?php echo e(Request::is('admin/section/feature') ? 'active' : ''); ?>">
                                <i class="fa fa-circle"></i><?php echo e(__('App Features')); ?>

                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('admin.section.index', 'how-it-work')); ?>"
                                class="<?php echo e(Request::is('admin/section/how-it-work') ? 'active' : ''); ?>">
                                <i class="fa fa-circle"></i><?php echo e(__('How It Work')); ?>

                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('admin.section.index', 'screenshots')); ?>"
                                class="<?php echo e(Request::is('admin/section/screenshots') ? 'active' : ''); ?>">
                                <i class="fa fa-circle"></i><?php echo e(__('Screenshots')); ?>

                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('admin.section.index', 'team')); ?>"
                                class="<?php echo e(Request::is('admin/section/team') ? 'active' : ''); ?>">
                                <i class="fa fa-circle"></i><?php echo e(__('Team')); ?>

                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('admin.section.index', 'pricing-plan')); ?>"
                                class="<?php echo e(Request::is('admin/section/pricing-plan') ? 'active' : ''); ?>">
                                <i class="fa fa-circle"></i><?php echo e(__('Pricing Plans')); ?>

                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('admin.section.index', 'testimonial')); ?>"
                                class="<?php echo e(Request::is('admin/section/testimonial') ? 'active' : ''); ?>">
                                <i class="fa fa-circle"></i><?php echo e(__('Testimonials')); ?>

                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('admin.section.index', 'faq')); ?>"
                                class="<?php echo e(Request::is('admin/section/faq') ? 'active' : ''); ?>">
                                <i class="fa fa-circle"></i><?php echo e(__('FAQ\'s')); ?>

                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('admin.section.index', 'recent-blog')); ?>"
                                class="<?php echo e(Request::is('admin/section/recent-blog') ? 'active' : ''); ?>">
                                <i class="fa fa-circle"></i><?php echo e(__('Recent Blogs')); ?>

                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('admin.section.index', 'download')); ?>"
                                class="<?php echo e(Request::is('admin/section/download') ? 'active' : ''); ?>">
                                <i class="fa fa-circle"></i><?php echo e(__('Download')); ?>

                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('admin.section.index', 'contact')); ?>"
                                class="<?php echo e(Request::is('admin/section/contact') ? 'active' : ''); ?>">
                                <i class="fa fa-circle"></i><?php echo e(__('Contact')); ?>

                            </a>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>
            <li>
                <a href="javascript:void(0);" class="sidebar-header">
                    <i data-feather="sliders"></i><span><?php echo e(__('Settings')); ?></span><i
                        class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="sidebar-submenu <?php echo e(Request::is('admin/setting*') ? 'menu-open' : ''); ?>">
                    <li>
                        <a href="<?php echo e(route('admin.setting.index', 'general')); ?>"
                            class="<?php echo e(Request::is('admin/setting/general') ? 'active' : ''); ?>">
                            <i class="fa fa-circle"></i><?php echo e(__('General')); ?>

                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('admin.setting.index', 'smtp')); ?>"
                            class="<?php echo e(Request::is('admin/setting/smtp') ? 'active' : ''); ?>">
                            <i class="fa fa-circle"></i><?php echo e(__('SMTP Setting')); ?>

                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('admin.setting.index', 'reading')); ?>"
                            class="<?php echo e(Request::is('admin/setting/reading') ? 'active' : ''); ?>">
                            <i class="fa fa-circle"></i><?php echo e(__('Reading')); ?>

                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('admin.setting.index', 'permalinks')); ?>"
                            class="<?php echo e(Request::is('admin/setting/permalinks') ? 'active' : ''); ?>">
                            <i class="fa fa-circle"></i><?php echo e(__('Permalinks')); ?>

                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('admin.setting.index', 'analytics')); ?>"
                            class="<?php echo e(Request::is('admin/setting/analytics') ? 'active' : ''); ?>">
                            <i class="fa fa-circle"></i><?php echo e(__('Analytics')); ?>

                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0);" class="sidebar-header">
                    <i data-feather="settings"></i><span><?php echo e(__('Theme Options')); ?></span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul
                    class="sidebar-submenu <?php echo e(Request::is('admin/themes*') || Request::is('admin/social-links*') ? 'menu-open' : ''); ?>">
                    <li>
                        <a href="<?php echo e(route('admin.theme.index', 'appearance')); ?>"
                            class="<?php echo e(Request::is('admin/themes/appearance') ? 'active' : ''); ?>">
                            <i class="fa fa-circle"></i><?php echo e(__('static.appearance')); ?>

                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('admin.theme.index', 'seo')); ?>"
                            class="<?php echo e(Request::is('admin/themes/seo') ? 'active' : ''); ?>">
                            <i class="fa fa-circle"></i><?php echo e(__('static.seo')); ?>

                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('admin.theme.index', 'comments-settings')); ?>"
                            class="<?php echo e(Request::is('admin/themes/comments-settings') ? 'active' : ''); ?>">
                            <i class="fa fa-circle"></i><?php echo e(__('static.comment')); ?>

                        </a>
                    </li>
                    


                    <li>
                        <a href="<?php echo e(route('admin.social-links.index')); ?>"
                            class="<?php echo e(Request::is('admin/social-links*') ? 'active' : ''); ?>">
                            <i class="fa fa-circle"></i><span><?php echo e(__('static.social_link')); ?></span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="<?php echo e(route('admin.clear-cache')); ?>" class="sidebar-header">
                    <i data-feather="feather"></i><span><?php echo e(__('Clear Cache')); ?></span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- Page Sidebar End -->
<?php /**PATH /home/webiots/Desktop/Git_hub/chat_loop_OPTIMIZE_CODE/chat_loop/resources/views/admin/layouts/partials/sidebar.blade.php ENDPATH**/ ?>