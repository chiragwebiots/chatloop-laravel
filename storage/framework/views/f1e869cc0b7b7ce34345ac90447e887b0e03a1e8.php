<?php $__env->startSection('title', 'Requirements'); ?>
<?php $__env->startSection('content'); ?>
    <div class="wizard-step-1 d-block">
        <h6>Please make sure the PHP extensions listed below are installed</h6>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Extensions</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $configurations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $configuration => $isCheck): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($configuration); ?></td>


                            <td class="icon-success">
                                <i class="fa-solid fa-<?php echo e($isCheck ? 'check' : 'times'); ?>"></i>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <div class="next-btn text-right">
            <?php if($configured): ?>
                <a href="<?php echo e(route('install.directories')); ?>" class="btn btn-primary">Next <i
                        class="far fa-hand-point-right ml-2"></i></a>
            <?php else: ?>
                <a href="javascript:void(0)" class="btn btn-primary disabled">Next <i
                        class="far fa-hand-point-right ml-2"></i></a>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('install.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webiots/Desktop/Git_hub/chat_loop_OPTIMIZE_CODE/chat_loop/resources/views/install/requirements.blade.php ENDPATH**/ ?>