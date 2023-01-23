<?php $__env->startSection('content'); ?>
    <div class="page-margin">
        <!-- breadcrumb start-->
        <div class="breadcrumb-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 d-align-center">
                        <h2 class="title"><span> Blog</span></h2>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <nav class="theme-breadcrumb" aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent mb-0">
                                <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
                                <li class="breadcrumb-item active"><a href="#">Blog</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb end-->
        <!-- blog Section start-->
        <section class="blog-page">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row blog-list">
                            <?php $__empty_1 = true; $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="col-lg-6 col-md-12">
                                    <div class="item news-slid"><a href="<?php echo e(route('blog.details', $blog->slug)); ?>">
                                            <div class="news-box"><img class="img-fluid"
                                                    src="<?php echo e(url(\App\Helpers\Helpers::media($blog->image)->url)); ?>"
                                                    alt="news-1"></div>
                                        </a>
                                        <div class="news-text">
                                            <div class="blog-hover">
                                                <h4><?php echo e($blog->title); ?></h4>
                                                <ul class="list-inline blog-details-list">
                                                    <li><a
                                                            href="<?php echo e(route('blogs.author', strtolower($blog->createdBy->name))); ?>"><?php echo e($blog->createdBy->name); ?></a>
                                                    </li>
                                                    <li><a
                                                            href="javascript:void(0)"><?php echo e($blog->created_at->format('d M')); ?></a>
                                                    </li>
                                                    <li><a href="javascript:void(0)"><?php echo e(__('25 comments')); ?></a></li>
                                                    <li><a href="javascript:void(0)"><?php echo e(__('3 View')); ?></a></li>
                                                </ul>
                                            </div>
                                            <p><?php echo e($blog->excerpt); ?></p><a class="btn-theme"
                                                href="<?php echo e(route('blog.details', $blog->slug)); ?>">View more</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <div class="row mt-5">
                                    <div class="w-50 mx-auto">
                                        <h3 class="text-secondary">Blogs not found!</h3>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="animation-circle absolute"><i></i><i></i><i></i></div>
            <div class="animation-circle-inverse"><i></i><i></i><i></i></div>
            <div class="row mt-5">
                <div class="w-50 mx-auto">
                    <?php echo $blogs->links(); ?>

                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webiots/Desktop/Git_hub/chat_loop_OPTIMIZE_CODE/chat_loop/resources/views/frontend/blog-list.blade.php ENDPATH**/ ?>