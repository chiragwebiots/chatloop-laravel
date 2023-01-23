<?php $__env->startSection('title', __('SMTP Settings')); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <li class="breadcrumb-item active"><?php echo e(__('Settings')); ?></li>
    <li class="breadcrumb-item active"><?php echo e(__('SMTP Settings')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="card tab2-card">
                <div class="card-header">
                    <h5><?php echo e(__('SMTP Settings')); ?></h5>
                </div>
                <?php echo Form::open(['route' => 'admin.setting.update', 'method' => 'PUT', 'class' => 'needs-validation user-add']); ?>

                <div class="card-body">
                    <div class="form-group row">
                        <?php echo Form::label('MAIL_MAILER', __('Mailer'), ['class' => 'col-xl-3 col-md-4']); ?>

                        <div class="col-xl-8 col-md-7">
                            <?php echo Form::text('mail_transport', $setting->mail_transport, ['class' => 'form-control']); ?>

                        </div>
                    </div>
                    <div class="form-group row">
                        <?php echo Form::label('MAIL_HOST', __('Mail Host'), ['class' => 'col-xl-3 col-md-4']); ?>

                        <div class="col-xl-8 col-md-7">
                            <?php echo Form::text('mail_host', $setting->mail_host, ['class' => 'form-control']); ?>

                        </div>
                    </div>
                    <div class="form-group row">
                        <?php echo Form::label('MAIL_PORT', __('Mail Port'), ['class' => 'col-xl-3 col-md-4']); ?>

                        <div class="col-xl-8 col-md-7">
                            <?php echo Form::text('mail_port', $setting->mail_port, ['class' => 'form-control']); ?>

                        </div>
                    </div>
                    <div class="form-group row">
                        <?php echo Form::label('MAIL_USERNAME', __('Mail Username'), ['class' => 'col-xl-3 col-md-4']); ?>

                        <div class="col-xl-8 col-md-7">
                            <?php echo Form::text('mail_username', $setting->mail_username, ['class' => 'form-control']); ?>

                        </div>
                    </div>
                    <div class="form-group row">
                        <?php echo Form::label('MAIL_PASSWORD', __('Mail Password'), ['class' => 'col-xl-3 col-md-4']); ?>

                        <div class="col-xl-8 col-md-7">
                            <?php echo Form::password('mail_password', ['class' => 'form-control']); ?>

                        </div>
                    </div>
                    <div class="form-group row">
                        <?php echo Form::label('MAIL_ENCRYPTION', __('Mail Encryption'), ['class' => 'col-xl-3 col-md-4']); ?>

                        <div class="col-xl-8 col-md-7">
                            <?php echo Form::text('mail_encryption', $setting->mail_encryption, ['class' => 'form-control']); ?>

                        </div>
                    </div>
                    <div class="form-group row">
                        <?php echo Form::label('MAIL_FROM_ADDRESS', __('Mail From Address'), ['class' => 'col-xl-3 col-md-4']); ?>

                        <div class="col-xl-8 col-md-7">
                            <?php echo Form::text('mail_from_address', $setting->mail_from_address, ['class' => 'form-control']); ?>

                        </div>
                    </div>
                    <div class="form-group row">
                        <?php echo Form::label('MAIL_FROM_NAME', __('Mail From Name'), ['class' => 'col-xl-3 col-md-4']); ?>

                        <div class="col-xl-8 col-md-7">
                            <?php echo Form::text('mail_from_name', $setting->mail_from_name, ['class' => 'form-control']); ?>

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

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webiots/Desktop/Git_hub/chat_loop_OPTIMIZE_CODE/chat_loop/resources/views/admin/settings/smtp.blade.php ENDPATH**/ ?>