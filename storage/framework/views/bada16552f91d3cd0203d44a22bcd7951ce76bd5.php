<?php $__env->startSection('title', 'Database'); ?>
<?php $__env->startSection('content'); ?>
    <div class="wizard-step-3 d-block">
        <form action="<?php echo e(route('install.database.config')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('POST'); ?>
            <!-- <?php echo e(csrf_field()); ?> -->
            <div class="row">


                <div class="database-field col-md-6">
                    <h6>Please enter your database configuration details below.</h6>
                    <div class="form-group form-row">
                        <label class="col-lg-3">Host <span class="required-fill">*</span></label>
                        <div class="col-lg-9">
                            <input type="text" name="database[DB_HOST]"
                                value="<?php echo e(old('database.DB_HOST') ? old('database.DB_HOST') : '127.0.0.1'); ?>"
                                class="form-control" placeholder="127.0.0.1" autocomplete="off">
                            <?php if($errors->has('database.DB_HOST')): ?>
                                <span class="text-danger"><?php echo e($errors->first('database.DB_HOST')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="col-lg-3">Port <span class="required-fill">*</span></label>
                        <div class="col-lg-9">
                            <input type="number" name="database[DB_PORT]"
                                value="<?php echo e(old('database.DB_PORT') ? old('database.DB_PORT') : '3306'); ?>"
                                class="form-control" placeholder="3306" autocomplete="off">
                            <?php if($errors->has('database.DB_PORT')): ?>
                                <span class="text-danger"><?php echo e($errors->first('database.DB_PORT')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="col-lg-3">DB Username <span class="required-fill">*</span></label>
                        <div class="col-lg-9">
                            <input type="text" name="database[DB_USERNAME]" value="<?php echo e(old('database.DB_USERNAME')); ?>"
                                class="form-control" autocomplete="off">
                            <?php if($errors->has('database.DB_USERNAME')): ?>
                                <span class="text-danger"><?php echo e($errors->first('database.DB_USERNAME')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="col-lg-3">DB Password <span class="required-fill">*</span></label>
                        <div class="col-lg-9">
                            <input type="password" name="database[DB_PASSWORD]" class="form-control" autocomplete="off">
                            <?php if($errors->has('database.DB_PASSWORD')): ?>
                                <span class="text-danger"><?php echo e($errors->first('database.DB_PASSWORD')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="col-lg-3">Database Name<span class="required-fill">*</span></label>
                        <div class="col-lg-9">
                            <input type="text" name="database[DB_DATABASE]" value="<?php echo e(old('database.DB_DATABASE')); ?>"
                                class="form-control" autocomplete="off">
                            <?php if($errors->has('database.DB_DATABASE')): ?>
                                <span class="text-danger"><?php echo e($errors->first('database.DB_DATABASE')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="database-field col-md-6">
                    <h6>Please enter your administration details below.</h6>
                    <div class="form-group form-row">
                        <label class="col-lg-3">First Name <span class="required-fill">*</span></label>
                        <div class="col-lg-9">
                            <input type="text" name="admin[first_name]" value="<?php echo e(old('admin.first_name')); ?>"
                                class="form-control" autocomplete="off">
                            <?php if($errors->has('admin.first_name')): ?>
                                <span class="text-danger"><?php echo e($errors->first('admin.first_name')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="col-lg-3">Last Name <span class="required-fill">*</span></label>
                        <div class="col-lg-9">
                            <input type="text" name="admin[last_name]" value="<?php echo e(old('admin.last_name')); ?>"
                                class="form-control" autocomplete="off">
                            <?php if($errors->has('admin.last_name')): ?>
                                <span class="text-danger"><?php echo e($errors->first('admin.last_name')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="col-lg-3">Email <span class="required-fill">*</span></label>
                        <div class="col-lg-9">
                            <input type="email" name="admin[email]" value="<?php echo e(old('admin.email')); ?>" class="form-control"
                                autocomplete="off">
                            <?php if($errors->has('admin.email')): ?>
                                <span class="text-danger"><?php echo e($errors->first('admin.email')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="col-lg-3">Password <span class="required-fill">*</span></label>
                        <div class="col-lg-9">
                            <input type="password" name="admin[password]" class="form-control" autocomplete="off">
                            <?php if($errors->has('admin.password')): ?>
                                <span class="text-danger"><?php echo e($errors->first('admin.password')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="col-lg-3">Confirm Password <span class="required-fill">*</span></label>
                        <div class="col-lg-9">
                            <input type="password" name="admin[password_confirmation]" class="form-control"
                                autocomplete="off">
                            <?php if($errors->has('admin.password_confirmation')): ?>
                                <span class="text-danger"><?php echo e($errors->first('admin.password_confirmation')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="next-btn d-flex">
            <a href="<?php echo e(route('install.license')); ?>" class="btn btn-primary"><i class="far fa-hand-point-left mr-2"></i>
                Previous</a>
            <a href="javascript:void(0)" class="btn btn-primary sumit-form">Next <i
                    class="far fa-hand-point-right ml-2"></i></a>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        $(".sumit-form").click(function() {
            $("form").submit();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('install.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webiots/Desktop/Git_hub/chat_loop_OPTIMIZE_CODE/chat_loop/resources/views/install/database.blade.php ENDPATH**/ ?>