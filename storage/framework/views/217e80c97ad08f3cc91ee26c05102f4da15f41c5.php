<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="icon"
        href="<?php echo e(isset($theme->favic_icon) ? url(\App\Helpers\Helpers::media($theme->favic_icon)->url) : asset('favicon.png')); ?>"
        type="image/x-icon">

    <link rel="shortcut icon"
        href="<?php echo e(isset($theme->favic_icon) ? url(\App\Helpers\Helpers::media($theme->favic_icon)->url) : asset('favicon.png')); ?>"
        type="image/x-icon">
    <title><?php echo $__env->yieldContent('title'); ?> - <?php echo e(__('Chatloop Admin Panel')); ?></title>

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/vendors/fontawesome.css')); ?>">
    <!-- Themify-font-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/vendors/themify-icons.css')); ?>">
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/vendors/bootstrap.css')); ?>">
    <!-- Datatable css-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/vendors/datatables.css')); ?>">
    <!-- Select2 css-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/vendors/select2.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/vendors/dropzone.css')); ?>">
    <!-- Nprogress css-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/vendors/nprogress.css')); ?>">
    <?php echo $__env->yieldPushContent('style'); ?>

    <!-- Toster notification -->
    <link href="<?php echo e(asset('admin/css/vendors/toster.css')); ?>" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/toster2.css')); ?>">

    <!-- DataTable Select cdn CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0- 
     alpha/css/bootstrap.css"
        rel="stylesheet">


    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Admin css-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('admin/css/admin.css')); ?>">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script src="<?php echo e(asset('admin/js/admin-cart.min.js')); ?>"></script>

</head>

<body>

    <div class="page-wrapper">

        <?php if ($__env->exists('admin.layouts.partials.header')) echo $__env->make('admin.layouts.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="page-body-wrapper">

            <?php if ($__env->exists('admin.layouts.partials.sidebar')) echo $__env->make('admin.layouts.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="page-body">

                <?php if ($__env->exists('admin.layouts.partials.breadcrumb')) echo $__env->make('admin.layouts.partials.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="container-fluid">

                    <?php if ($__env->exists('admin.inc.alerts')) echo $__env->make('admin.inc.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php echo $__env->yieldContent('content'); ?>

                </div>

            </div>

            <?php if ($__env->exists('admin.layouts.partials.footer')) echo $__env->make('admin.layouts.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php if ($__env->exists('admin.inc.files')) echo $__env->make('admin.inc.files', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div>

    </div>

    <!-- Latest jquery -->
    <script src="<?php echo e(asset('admin/js/jquery-3.3.1.min.js')); ?>"></script>
    <!-- Bootstrap js -->
    <script src="<?php echo e(asset('admin/js/bootstrap.min.js')); ?>"></script>
    <!-- Feather icon js -->
    <script src="<?php echo e(asset('admin/js/feather.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/feather-icon.js')); ?>"></script>
    <!-- Height equal js -->
    <script src="<?php echo e(asset('admin/js/height-equal.js')); ?>"></script>
    <!-- Datatable js -->
    <script src="<?php echo e(asset('admin/js/datatables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/buttons.server-side.js')); ?>"></script>
    <!-- Nprogress js -->
    <script src="<?php echo e(asset('admin/js/nprogress.js')); ?>"></script>
    <!-- Sidebar jquery -->
    <script src="<?php echo e(asset('admin/js/sidebar-menu.js')); ?>"></script>
    <!-- Tinymce Editor -->
    <script src="<?php echo e(asset('admin/js/tinymce/tinymce.js')); ?>"></script>
    <!-- Select2 -->
    <script src="<?php echo e(asset('admin/js/select2.full.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/dropzone.js')); ?>"></script>

    <?php echo $__env->yieldPushContent('js'); ?>

    <script src="<?php echo e(asset('admin/js/dropzone.js')); ?>"></script>

    <!-- DataTable Select cdn -->
    <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>

    <?php if ($__env->exists('admin.layouts.partials.script')) echo $__env->make('admin.layouts.partials.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Script admin -->
    <script src="<?php echo e(asset('admin/js/admin-script.js')); ?>"></script>

</body>

</html>
<?php /**PATH /home/webiots/Desktop/Git_hub/chat_loop_OPTIMIZE_CODE/chat_loop/resources/views/admin/layouts/master.blade.php ENDPATH**/ ?>