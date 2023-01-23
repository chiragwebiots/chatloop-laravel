<?php $__env->startSection('title', __('static.profile')); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <li class="breadcrumb-item active"><?php echo e(__('static.profile')); ?></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xl-12">
            <div class="card tab2-card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-material" id="top-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link <?php echo e($errors->has('name') || $errors->has('email') || !$errors->any() ? 'active' : ''); ?>"
                                id="top-profile-tab" data-bs-toggle="tab" href="#top-profile" role="tab"
                                aria-controls="top-profile" aria-selected="true">
                                <i data-feather="user" class="me-2"></i><?php echo e(__('static.profile')); ?>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo e($errors->has('current_password') || $errors->has('new_password') || $errors->has('confirm_password') ? 'active' : ''); ?>"
                                id="changepassword-tab" data-bs-toggle="tab" href="#changepassword" role="tab"
                                aria-controls="changepassword" aria-selected="false">
                                <i data-feather="settings" class="me-2"></i><?php echo e(__('static.change_password')); ?>

                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="top-tabContent">
                        <div class="tab-pane fade <?php echo e($errors->has('name') || $errors->has('email') || !$errors->any() ? 'show active' : ''); ?>"
                            id="top-profile" role="tabpanel" aria-labelledby="top-profile-tab">
                            <?php echo Form::open(['route' => 'admin.account.profile.update', 'method' => 'PUT']); ?>

                            <div class="form-group row">
                                <?php echo Form::label('image', __('Image'), ['class' => 'col-xl-2 col-md-3'], false); ?>

                                <div class="col-xl-7 col-md-8">
                                    <?php echo Form::file('image', [
                                        'class' => 'form-control media-manager',
                                        'onclick' => 'return false',
                                        'multiple' => false,
                                    ]); ?>

                                    <?php echo Form::hidden('image', Auth::user()->image ? Auth::user()->image : null, ['class' => 'selected-file']); ?>

                                    <div select="image" class="row upload-card selected-media selected-custom-row g-3 pt-3">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <?php echo Form::label('name', __('static.fullname'), ['class' => 'col-xl-2 col-md-3']); ?>

                                <div class="col-xl-7 col-md-8">
                                    <?php echo Form::text('name', Auth::user()->name ? Auth::user()->name : old('name'), ['class' => 'form-control']); ?>

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
                                <?php echo Form::label('email', __('static.email'), ['class' => 'col-xl-2 col-md-3']); ?>

                                <div class="col-xl-7 col-md-8">
                                    <?php echo Form::email('email', Auth::user()->email ? Auth::user()->email : old('email'), ['class' => 'form-control']); ?>

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
                            <div class="form-footer">
                                <?php echo Form::submit(__('static.save'), ['class' => 'btn btn-primary']); ?>

                            </div>
                            <?php echo Form::close(); ?>

                        </div>
                        <div class="tab-pane fade <?php echo e($errors->has('current_password') || $errors->has('new_password') || $errors->has('confirm_password') ? 'active show' : ''); ?>"
                            id="changepassword" role="tabpanel" aria-labelledby="changepassword-tab">
                            <div class="account-setting">
                                <?php echo Form::open(['route' => 'admin.account.password.update', 'method' => 'PUT']); ?>

                                <div class="form-group row">
                                    <?php echo Form::label('current_password', __('static.current_password'), ['class' => 'col-xl-2 col-md-3']); ?>

                                    <div class="col-xl-7 col-md-8">
                                        <?php echo Form::password('current_password', ['class' => 'form-control']); ?>

                                        <?php $__errorArgs = ['current_password'];
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
                                    <?php echo Form::label('new_password', __('static.new_password'), ['class' => 'col-xl-2 col-md-3']); ?>

                                    <div class="col-xl-7 col-md-8">
                                        <?php echo Form::password('new_password', ['class' => 'form-control']); ?>

                                        <?php $__errorArgs = ['new_password'];
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
                                    <?php echo Form::label('confirm_password', __('static.confirm_password'), ['class' => 'col-xl-2 col-md-3']); ?>

                                    <div class="col-xl-7 col-md-8">
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
                                <div class="form-footer">
                                    <?php echo Form::submit(__('static.save'), ['class' => 'btn btn-primary']); ?>

                                </div>
                                <?php echo Form::close(); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webiots/Desktop/Git_hub/chat_loop_OPTIMIZE_CODE/chat_loop/resources/views/admin/account/profile.blade.php ENDPATH**/ ?>