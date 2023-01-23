<?php $__env->startSection('title', __('static.dashboard')); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <li class="breadcrumb-item active"><?php echo e(__('static.dashboard')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xl-3 col-md-6 xl-50">
            <div class="card o-hidden widget-cards">
                <div class="bg-warning card-body">
                    <div class="media static-top-widget row">
                        <div class="icons-widgets col-4">
                            <div class="align-self-center text-center"><i data-feather="navigation" class="font-warning"></i>
                            </div>
                        </div>
                        <div class="media-body col-8"><span class="m-0"><?php echo e(__('static.users.users')); ?></span>
                            <h3 class="mb-0"><span class="counter"><?php echo e($users); ?></span><small></small>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 xl-50">
            <div class="card o-hidden  widget-cards">
                <div class="bg-secondary card-body">
                    <div class="media static-top-widget row">
                        <div class="icons-widgets col-4">
                            <div class="align-self-center text-center"><i data-feather="box" class="font-secondary"></i>
                            </div>
                        </div>
                        <div class="media-body col-8"><span class="m-0"><?php echo e(__('static.blog_coments')); ?></span>
                            <h3 class="mb-0"><span class="counter">0</span><small></small>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 xl-50">
            <div class="card o-hidden widget-cards">
                <div class="bg-primary card-body">
                    <div class="media static-top-widget row">
                        <div class="icons-widgets col-4">
                            <div class="align-self-center text-center"><i data-feather="message-square"
                                    class="font-primary"></i></div>
                        </div>
                        <div class="media-body col-8"><span class="m-0"><?php echo e(__('static.posts')); ?></span>
                            <h3 class="mb-0"><span class="counter"><?php echo e($posts); ?></span><small></small>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 xl-50">
            <div class="card o-hidden widget-cards">
                <div class="bg-danger card-body">
                    <div class="media static-top-widget row">
                        <div class="icons-widgets col-4">
                            <div class="align-self-center text-center"><i data-feather="message-square"
                                    class="font-danger"></i></div>
                        </div>
                        <div class="media-body col-8"><span class="m-0"><?php echo e(__('static.pages.pages')); ?></span>
                            <h3 class="mb-0"><span class="counter"><?php echo e($pages); ?></span><small></small>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('static.visitors')); ?></h5>
                    <span>Below Map is displaying the world map.</span>
                </div>
                <div class="card-body">
                    <div class="row align-items-start g-sm-4 g-2">
                        <div class="col-xl-8">
                            <div class="jvector-map-height" id="world-map"></div>
                        </div>
                        <div class="col-xl-4">
                            <ul class="visitors-date-list">
                                <li>
                                    <div class="visitors-date-box bg-red">
                                        <div class="visitors-icon">
                                            <i data-feather="clock"></i>
                                        </div>
                                        <div class="visitors-content">
                                            <div class="left">
                                                <h5>average duration</h5>
                                            </div>

                                            <div class="right">
                                                <h6><?php echo e(gmdate('H:i:s', $analyticsData['totalsForAllResults']['ga:avgSessionDuration'])); ?>

                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="visitors-date-box bg-yellow">
                                        <div class="visitors-icon">
                                            <i data-feather="zap"></i>
                                        </div>
                                        <div class="visitors-content">
                                            <div class="left">
                                                <h5>Bounce Rate</h5>
                                            </div>

                                            <div class="right">
                                                <h6><?php echo e(round($analyticsData['totalsForAllResults']['ga:bounceRate'], 2)); ?>%
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="visitors-date-box bg-blue">
                                        <div class="visitors-icon">
                                            <i data-feather="user-plus"></i>
                                        </div>
                                        <div class="visitors-content">
                                            <div class="left">
                                                <h5>New visitors</h5>
                                            </div>

                                            <div class="right">
                                                <h6><?php echo e($analyticsData['totalsForAllResults']['ga:newUsers']); ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="visitors-date-box bg-orange">
                                        <div class="visitors-icon">
                                            <i data-feather="users"></i>
                                        </div>
                                        <div class="visitors-content">
                                            <div class="left">
                                                <h5>Visitors</h5>
                                            </div>

                                            <div class="right">
                                                <h6><?php echo e($analyticsData['totalsForAllResults']['ga:users']); ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-4 col-md-6">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="media">
                        <div class="media-body">
                            <h5>Recent Activity</h5>
                        </div>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <i data-feather="more-horizontal"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="activity-media">
                        <ul class="activity-date-list">
                            <?php $__empty_1 = true; $__currentLoopData = $recentActivitys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recentActivity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <li>
                                    <div class="activity-date-box">
                                        <div class="activity-content">
                                            <h5><?php echo e($recentActivity->description); ?></h5>
                                        </div>
                                        <div class="activity-date">
                                            <div class="date-left">
                                                <i class="fa fa-clock-o"></i>
                                                <span><?php echo e($recentActivity->created_at->format('d-m-Y')); ?></span>
                                            </div>

                                            <div class="date-right">
                                                <span><?php echo e($recentActivity->created_at->diffForHumans()); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <h5>No Activity Found</h5>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-4 col-md-6">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="media">
                        <div class="media-body">
                            <h5>Countries</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="progress-box-list">
                        <?php $__empty_1 = true; $__currentLoopData = $array2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <li>
                                <div class="progress-box">
                                    <div class="progress-name">
                                        <h5><?php echo e($a['country']); ?></h5>
                                        <h5><?php echo e(Round((intval($a['users']) / intval($analyticsData['totalsForAllResults']['ga:users'])) * 100, 2)); ?>%
                                        </h5>
                                    </div>
                                    <div class="progress city-progress m-t-5">
                                        <?php if($a['country'] == 'India'): ?>
                                            <div class="progress-bar bg-pink" role="progressbar"
                                                style="width:<?php echo e(Round((intval($a['users']) / intval($analyticsData['totalsForAllResults']['ga:users'])) * 100, 2)); ?>%">
                                            </div>
                                        <?php elseif($a['country'] == 'United Kingdom'): ?>
                                            <div class="progress-bar bg-orange" role="progressbar"
                                                style="width: <?php echo e(Round((intval($a['users']) / intval($analyticsData['totalsForAllResults']['ga:users'])) * 100, 2)); ?>%">
                                            </div>
                                        <?php elseif($a['country'] == 'Lithuania'): ?>
                                            <div class="progress-bar bg-grey" role="progressbar"
                                                style="width: <?php echo e(Round((intval($a['users']) / intval($analyticsData['totalsForAllResults']['ga:users'])) * 100, 2)); ?>%">
                                            </div>
                                        <?php endif; ?>
                                        
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <h1>No Data Found</h1>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-xxl-4 col-md-6">
            <div class="card h-100vh">
                <div class="card-header">
                    <h5><?php echo e(__('static.device_chart')); ?></h5>
                </div>
                <div class="card-body">
                    <div id="chart">

                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-6 col-lg-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('static.blog.recent_blogs')); ?></h5>
                </div>
                <div class="card-body">
                    <div class="custom-height">
                        <ul class="list-unstyled list-unstyled-border">
                            <?php $__currentLoopData = $recentBlogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recentBlog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="media">
                                    <div class="media-image">
                                        <img class="img-fluid" src="<?php echo e(url(\App\Helpers\Helpers::media($recentBlog->image)->url)); ?>" alt="not found">
                                    </div>
                                    <div class="media-body">
                                        <a href="#">
                                            <h5><?php echo e($recentBlog->title); ?></h5>
                                        </a>
                                        <div class="blog-date">
                                            <h6><?php echo e($recentBlog->created_at->format('d/m/Y')); ?></h5>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-6 col-lg-12 col-md-6">
            <div class="card h-100vh">
                <div class="card-header">
                    <h5><?php echo e(__('static.recent_comments')); ?></h5>
                </div>
                <div class="card-body">
                    <div class="popular-table">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-center">Rank</th>
                                        <th>Recent Comment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">01.</td>
                                        <td class="avatar-name">25 Surprising Facts About Chair</td>
                                    </tr>

                                    <tr>
                                        <td class="text-center">01.</td>
                                        <td class="avatar-name">25 Surprising Facts About Chair</td>
                                    </tr>

                                    <tr>
                                        <td class="text-center">01.</td>
                                        <td class="avatar-name">25 Surprising Facts About Chair</td>
                                    </tr>

                                    <tr>
                                        <td class="text-center">01.</td>
                                        <td class="avatar-name">25 Surprising Facts About Chair</td>
                                    </tr>

                                    <tr>
                                        <td class="text-center">01.</td>
                                        <td class="avatar-name">25 Surprising Facts About Chair</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        var options = {
            series: [<?php echo e($desktopuser); ?>, <?php echo e($mobileuser); ?>, <?php echo e($tabletuser); ?>],
            labels: ['Desktop', 'Mobile', 'Tablet'],
            chart: {
                type: 'donut',
                height: 240,
                // width: '75%',
                // offsetX: 50
            },
            plotOptions: {
                pie: {
                    expandOnClick: false,
                    size: 250,
                    donut: {
                        labels: {
                            show: true,
                        }
                    },
                }
            },
            responsive: [{
                breakpoint: 1643,
                options: {
                    chart: {
                        height: 300,
                    }
                },
                breakpoint: 1598,
                options: {
                    chart: {
                        height: 900,
                    }
                },
                breakpoint: 1556,
                options: {
                    chart: {
                        height: 900,
                    }
                },
            }]
        };



        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    
    <script src="<?php echo e(asset('admin/js/admin-chart.js')); ?>"></script>

    
    <script src="<?php echo e(asset('admin/js/vectormap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/vectormap.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/vectormapcustom.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webiots/Desktop/Git_hub/chat_loop_OPTIMIZE_CODE/chat_loop/resources/views/admin/dashboard/index.blade.php ENDPATH**/ ?>