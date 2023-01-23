<div class="sidebar">
    <div class="sidebar-space">
        <h4 class="blog-title"><?php echo e(__('Categories')); ?></h4>
        <div class="blog-divider"></div>
        <div class="blog-cat-detail">
            <ul>

                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="marg-15">
                        <a href="<?php echo e(route('blogs.category', $category->slug)); ?>">
                            <i class="fa fa-angle-right" aria-hidden="true"></i> <?php echo e($category->title); ?>

                        </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
    <div class="sidebar-space">
        <h4 class="blog-title"><?php echo e(__('Popular Tag')); ?></h4>
        <div class="blog-divider"></div>
        <div class="tags marg-20">
            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('blogs.tag', $tag->slug)); ?>">
                    <span class="badge badge-theme"><?php echo e($tag->title); ?></span>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <h4 class="blog-title"><?php echo e(__('Recent Posts')); ?></h4>
    <div class="blog-divider"></div>
    <div class="recent-blog marg-20">
        <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="media d-flex">
                <img class="me-3" src="<?php echo e(url(\App\Helpers\Helpers::media($blog->image)->url)); ?>" alt="blog">
                <div class="media-body">
                    <a href="<?php echo e(route('blog.details', $blog->slug)); ?>">
                        <h5 class="mt-0"><?php echo e($blog->title); ?></h5>
                    </a>
                    <p class="m-0"><?php echo e($blog->created_at->format('d M')); ?></p>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php /**PATH /home/webiots/Desktop/Git_hub/chat_loop_OPTIMIZE_CODE/chat_loop/resources/views/frontend/layouts/partials/sidebar.blade.php ENDPATH**/ ?>