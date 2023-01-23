<?php $__env->startSection('title', 'Installation Completed'); ?>
<?php $__env->startSection('content'); ?>
<div class="wizard-step-4 d-block">
    <div class="install-complete">
        <i data-feather="check-circle"></i>
        <h3>Multikart installed successfully !</h3>
    </div>
    <div class="row goto-selection">
        <div class="col-sm-6">
            <a href="<?php echo e(route('login')); ?>">
                <div class="selection-box">
                    <i data-feather="airplay"></i>
                    <h5 class="mt-2">Go to your shop</h5>
                </div>
            </a>
        </div>
        <div class="col-sm-6">
            <a href="<?php echo e(route('login')); ?>">
                <div class="selection-box">
                    <i data-feather="settings"></i>
                    <h5 class="mt-2">Login to Administration</h5>
                </div>
            </a>
        </div>
    </div>
 </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('install.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webiots/Desktop/Git_hub/chat_loop_OPTIMIZE_CODE/chat_loop/resources/views/install/completed.blade.php ENDPATH**/ ?>