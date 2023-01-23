<?php $__env->startSection('title', __('static.users.users')); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <li class="breadcrumb-item active"><?php echo e(__('static.users.users')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h5><?php echo e(__('static.users.users')); ?></h5>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.role.create')): ?>
                <div class="btn-popup ms-auto mb-0">
                    <a href="<?php echo e(route('admin.user.create')); ?>" class="btn btn-primary"><?php echo e(__('static.users.create')); ?></a>
                </div>
            <?php endif; ?>
            <a href="javascript:void(0);" class="btn btn-sm btn-danger deleteConfirmationBtn"
                style="display: none; margin-left: 8px;" data-url="<?php echo e(route('admin.delete.users')); ?>">
                <i class="fa fa-trash">
                    <span id="count-selected-rows">0</span>
                </i><?php echo e(__('static.delete_selected')); ?>

            </a>
        </div>
        <div class="card-body">
            <?php echo $dataTable->table(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <?php echo $dataTable->scripts(); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webiots/Desktop/Git_hub/chat_loop_OPTIMIZE_CODE/chat_loop/resources/views/admin/user/index.blade.php ENDPATH**/ ?>