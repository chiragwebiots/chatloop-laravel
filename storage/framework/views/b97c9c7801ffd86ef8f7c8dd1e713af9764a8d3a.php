<?php $__env->startSection('title', __('Analytics')); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <li class="breadcrumb-item active"><?php echo e(__('Settings')); ?></li>
    <li class="breadcrumb-item active"><?php echo e(__('Analytics')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="card tab2-card">
                <div class="card-header">
                    <h5><?php echo e(__('Analytics')); ?></h5>
                </div>
                <?php echo Form::open(['route' => 'admin.setting.update', 'method' => 'PUT', 'class' => 'needs-validation user-add']); ?>

                <div class="card-body">
                    <div class="form-group row">
                        <?php echo Form::label('google_analytics', __('Google Analytics ID'), ['class' => 'col-xl-3 col-md-4']); ?>

                        <div class="col-xl-8 col-md-7">
                            <?php echo Form::text('google_analytics', $setting->google_analytics, ['class' => 'form-control']); ?>

                        </div>
                    </div>
                    <div class="form-group row">
                        <?php echo Form::label('facebook_pixel', __('Facebook Pixel ID'), ['class' => 'col-xl-3 col-md-4']); ?>

                        <div class="col-xl-8 col-md-7">
                            <?php echo Form::text('facebook_pixel', $setting->facebook_pixel, ['class' => 'form-control']); ?>

                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <?php echo Form::submit(__('static.save'), ['class' => 'btn btn-primary']); ?>

                </div>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webiots/Desktop/Git_hub/chat_loop_OPTIMIZE_CODE/chat_loop/resources/views/admin/settings/analytics.blade.php ENDPATH**/ ?>