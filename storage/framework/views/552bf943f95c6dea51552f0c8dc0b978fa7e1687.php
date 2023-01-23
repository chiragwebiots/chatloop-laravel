<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>
                        <?php echo $__env->yieldContent('title'); ?>
                        <small><?php echo e(__('Chatloop Admin Panel')); ?></small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><i data-feather="home"></i></a>
                    </li>
                    <?php echo $__env->yieldContent('breadcrumbs'); ?>
                </ol>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/webiots/Desktop/Git_hub/chat_loop_OPTIMIZE_CODE/chat_loop/resources/views/admin/layouts/partials/breadcrumb.blade.php ENDPATH**/ ?>