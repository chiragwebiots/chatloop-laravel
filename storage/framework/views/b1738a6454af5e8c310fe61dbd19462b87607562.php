<div class="roles">
    <div class="card-header">
        <h5><?php echo e(isset($role) ? __('static.roles.edit') : __('static.roles.add')); ?></h5>
    </div>
    <div class="card-body">
        <div class="form-group row">
            <?php echo Form::label('name', __('static.name') . ' <span>*</span>', ['class' => 'col-xl-3 col-md-4'], false); ?>

            <div class="col-xl-8 col-md-7">
                <?php echo Form::text('name', isset($role->name) ? $role->name : old('name'), ['class' => 'form-control']); ?>

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
    </div>
</div>
<div class="permission">
    <div class="card-header">
        <h5><?php echo e(__('Permissions')); ?></h5>
    </div>
    <div class="card-body">
        <div class="permision-section">
            <ul>
                <?php $__currentLoopData = \App\Helpers\Helpers::modules(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <h5><?php echo e($module->name); ?>:</h5>
                        <div class="form-group m-checkbox-inline mb-0 d-flex">
                            <?php
                                $permissions = isset($role)
                                    ? $role
                                        ->getAllPermissions()
                                        ->pluck('name')
                                        ->toArray()
                                    : [];
                            ?>
                            <label class="d-block" for="all-<?php echo e($module->name); ?>">
                                <?php echo Form::checkbox(null, $module->name, false, [
                                    'class' => 'checkbox_animated select-all-permission',
                                    'id' => 'all-' . $module->name,
                                ]); ?>

                                <?php echo e(__('All')); ?>

                            </label>
                            <?php $__currentLoopData = $module->actions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action => $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <label class="d-block" for="<?php echo e($permission); ?>">
                                    <?php echo Form::checkbox('permissions[]', $permission, in_array($permission, $permissions) ? true : false, [
                                        'class' => 'checkbox_animated module_' . $module->name,
                                        'id' => $permission,
                                    ]); ?>

                                    <?php echo e($action); ?>

                                </label>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
</div>
<?php /**PATH /home/webiots/Desktop/Git_hub/chat_loop_OPTIMIZE_CODE/chat_loop/resources/views/admin/role/fields.blade.php ENDPATH**/ ?>