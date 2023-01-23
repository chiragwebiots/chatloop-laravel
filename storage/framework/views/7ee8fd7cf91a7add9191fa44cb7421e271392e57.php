<?php $__env->startSection('title', 'Directories'); ?>
<?php $__env->startSection('content'); ?>
    <div class="wizard-step-2 d-block">
        <h6>Please make sure you have set the correct permissions for the directories listed below</h6>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Directories</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $directories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $directory => $isCheck): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($directory); ?></td>
                            <td class="icon-success">
                                <i class="fas fa-<?php echo e($isCheck ? 'check' : 'times'); ?>"></i>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <div class="next-btn d-flex">
            <a href="<?php echo e(route('install.requirements')); ?>" class="btn btn-primary prev1"><i
                    class="far fa-hand-point-left mr-2"></i> Previous</a>
            <?php if($configured): ?>
                <a href="<?php echo e(route('install.license')); ?>" class="btn btn-primary">Next <i
                        class="far fa-hand-point-right ml-2"></i></a>
            <?php else: ?>
                <a href="javascript:void(0)" class="btn btn-primary disabled">Next <i
                        class="far fa-hand-point-right ml-2"></i></a>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('install.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webiots/Desktop/Git_hub/chat_loop_OPTIMIZE_CODE/chat_loop/resources/views/install/directories.blade.php ENDPATH**/ ?>