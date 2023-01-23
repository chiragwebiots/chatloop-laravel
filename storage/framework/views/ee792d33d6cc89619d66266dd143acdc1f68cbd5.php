<?php $__env->startSection('title', __('static.roles.roles')); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <li class="breadcrumb-item active"><?php echo e(__('static.roles.roles')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h5><?php echo e(__('static.roles.roles')); ?></h5>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin.role.create')): ?>
                <div class="btn-popup ms-auto mb-0">
                    <a href="<?php echo e(route('admin.role.create')); ?>" class="btn btn-primary"><?php echo e(__('static.roles.create')); ?></a>
                </div>
            <?php endif; ?>
            <a href="javascript:void(0);" class="btn btn-sm btn-danger deleteConfirmationBtn"
                style="display: none; margin-left: 8px;" data-url="<?php echo e(route('admin.delete.roles')); ?>">
                <i class="fa fa-trash">
                    <span id="count-selected-rows">0</span>
                </i> Delete Selected
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

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webiots/Desktop/Git_hub/chat_loop_OPTIMIZE_CODE/chat_loop/resources/views/admin/role/index.blade.php ENDPATH**/ ?>