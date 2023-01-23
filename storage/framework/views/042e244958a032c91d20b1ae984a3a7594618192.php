<?php $__env->startSection('title', __('static.users.create')); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.user.index')); ?>"><?php echo e(__('static.users.users')); ?></a></li>
    <li class="breadcrumb-item active"><?php echo e(__('static.users.create')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="card tab2-card">
                <div class="card-header">
                    <h5><?php echo e(__('static.users.create')); ?></h5>
                </div>
                <?php echo Form::open(['route' => 'admin.user.store', 'method' => 'POST', 'class' => 'needs-validation user-add']); ?>

                <div class="card-body">
                    <div class="form-group row">
                        <?php echo Form::label('name', __('static.name') . ' <span>*</span>', ['class' => 'col-xl-3 col-md-4'], false); ?>

                        <div class="col-xl-8 col-md-7">
                            <?php echo Form::text('name', old('name'), ['class' => 'form-control']); ?>

                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <?php echo Form::label('email', __('static.email') . ' <span>*</span>', ['class' => 'col-xl-3 col-md-4'], false); ?>

                        <div class="col-xl-8 col-md-7">
                            <?php echo Form::email('email', old('email'), ['class' => 'form-control']); ?>

                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <?php echo Form::label('password', __('static.password') . ' <span>*</span>', ['class' => 'col-xl-3 col-md-4'], false); ?>

                        <div class="col-xl-8 col-md-7">
                            <?php echo Form::password('password', ['class' => 'form-control']); ?>

                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <?php echo Form::label(
                            'confirm_password',
                            __('static.confirm_password') . ' <span>*</span>',
                            ['class' => 'col-xl-3 col-md-4'],
                            false,
                        ); ?>

                        <div class="col-xl-8 col-md-7">
                            <?php echo Form::password('confirm_password', ['class' => 'form-control']); ?>

                            <?php $__errorArgs = ['confirm_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <?php echo Form::label('roles', __('static.roles.roles') . ' <span>*</span>', ['class' => 'col-xl-3 col-md-4'], false); ?>

                        <div class="col-xl-8 col-md-7">
                            <?php echo e(Form::select('role', $roles, old('role'), ['class' => 'form-control select-2', 'placeholder' => 'Select Role'])); ?>

                            <?php $__errorArgs = ['role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webiots/Desktop/Git_hub/chat_loop_OPTIMIZE_CODE/chat_loop/resources/views/admin/user/create.blade.php ENDPATH**/ ?>