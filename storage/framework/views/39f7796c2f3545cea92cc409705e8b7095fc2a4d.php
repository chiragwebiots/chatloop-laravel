<?php $__env->startSection('title', __('static.roles.create')); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.role.index')); ?>"><?php echo e(__('static.roles.roles')); ?></a></li>
    <li class="breadcrumb-item active"><?php echo e(__('static.roles.create')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-12">
            <?php echo Form::open(['route' => 'admin.role.store', 'method' => 'POST', 'class' => 'needs-validation user-add']); ?>


            <div class="card">

                <?php echo $__env->make('admin.role.fields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="card-footer">
                    <?php echo Form::submit(__('static.save'), ['class' => 'btn btn-primary']); ?>

                </div>
            </div>

            <?php echo Form::close(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webiots/Desktop/Git_hub/chat_loop_OPTIMIZE_CODE/chat_loop/resources/views/admin/role/create.blade.php ENDPATH**/ ?>