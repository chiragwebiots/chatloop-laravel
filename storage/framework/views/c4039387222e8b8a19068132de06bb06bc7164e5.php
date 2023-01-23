<?php $__env->startSection('title', 'License'); ?>
<?php $__env->startSection('content'); ?>
    <div class="wizard-step-3 d-block">
        <form action="<?php echo e(route('install.license.setup')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('POST'); ?>
            <!-- <?php echo e(csrf_field()); ?> -->
            <div class="row">
                <div class="database-field col-md-12">
                    <h6>Please enter your Purchase code below.</h6>
                    <div class="form-group form-row mb-3">
                        <label class="col-lg-3">Purchase code<span class="required-fill">*</span></label>
                        <div class="col-lg">
                            <input type="text" name="license" value="<?php echo e(old('license') ? old('license') : ''); ?>"
                                class="form-control" placeholder="" autocomplete="off">
                            <?php if($errors->has('license')): ?>
                                <span class="text-danger"><?php echo e($errors->first('license')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="next-btn d-flex">
            <a href="<?php echo e(route('install.directories')); ?>" class="btn btn-primary"><i class="far fa-hand-point-left mr-2"></i>
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

<?php echo $__env->make('install.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webiots/Desktop/Git_hub/chat_loop_OPTIMIZE_CODE/chat_loop/resources/views/install/license.blade.php ENDPATH**/ ?>