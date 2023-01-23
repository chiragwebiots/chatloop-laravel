<?php if(isset($data)): ?>

    <?php if(isset($edit)): ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $data)): ?>
            <a href="<?php echo e(route($edit, $data->id)); ?>"><i class="edit-icon ti-pencil-alt"></i></a>
        <?php endif; ?>
    <?php endif; ?>

    <?php if(isset($delete)): ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $data)): ?>
            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#confirmationModal<?php echo e($data->id); ?>">
                <i class="remove-icon ti-trash delete-confirmation"></i>
            </a>
            <!-- Delete Confirmation -->
            <div class="modal fade" id="confirmationModal<?php echo e($data->id); ?>" tabindex="-1"
                aria-labelledby="confirmationModalLabel<?php echo e($data->id); ?>" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmationModalLabel<?php echo e($data->id); ?>">
                                <?php echo e(__('static.confirmation')); ?>

                            </h5>
                            <?php echo Form::button(null, ['class' => 'btn-close', 'data-bs-dismiss' => 'modal']); ?>

                        </div>
                        <div class="modal-body text-start">
                            <?php echo e(__('static.delete_message')); ?>

                        </div>
                        <div class="modal-footer">
                            <?php echo Form::open(['route' => [$delete, $data->id], 'method' => 'DELETE']); ?>


                            <?php echo Form::button(__('static.cancel'), ['class' => 'btn btn-secondary cancel', 'data-bs-dismiss' => 'modal']); ?>


                            <?php echo Form::submit(__('static.delete'), ['class' => 'btn btn-primary delete']); ?>


                            <?php echo Form::close(); ?>

                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Multiple Select Delete Confirmation -->
        <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModal"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteConfirmationModal">
                            <?php echo e(__('static.confirmation')); ?>

                        </h5>
                    </div>
                    <div class="modal-body text-start">
                        <?php echo e(__('static.delete_message')); ?>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary multi-delete-cancel" id="cancelModalBtn"
                            data-dismiss="modal"><?php echo e(__('static.cancel')); ?></button>
                        <button type="button" class="btn btn-primary"
                            id="confirm-DeleteRows"><?php echo e(__('static.delete')); ?></button>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if(Auth::user()->cannot('update', $data) && Auth::user()->cannot('delete', $data)): ?>
        <p class="text-danger"><strong><?php echo e(__('Access Denied')); ?></strong></p>
    <?php endif; ?>

<?php endif; ?>
<?php /**PATH /home/webiots/Desktop/Git_hub/chat_loop_OPTIMIZE_CODE/chat_loop/resources/views/admin/inc/action.blade.php ENDPATH**/ ?>