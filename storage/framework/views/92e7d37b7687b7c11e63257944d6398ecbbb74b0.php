<?php $__env->startSection('content'); ?>
    <div class="page-margin">
        <div class="breadcrumb-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 d-align-center">
                        <h2 class="title"><span><?php echo e($blog->title); ?></span></h2>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <nav class="theme-breadcrumb" aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent mb-0">
                                <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
                                <li class="breadcrumb-item"><a href="<?php echo e(route('blogs')); ?>"><?php echo e(__('Blogs')); ?></a></li>
                                <li class="breadcrumb-item active"><?php echo e($blog->title); ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <section class="blog-page">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-8 col-lg-9">
                        <div class="blog-details news-slid">
                            <div class="news-box">
                                <img class="img-fluid" src="<?php echo e(url(\App\Helpers\Helpers::media($blog->image)->url)); ?>"
                                    alt="news-1">
                            </div>
                            <div class="news-text">
                                <div class="blog-hover">
                                    <h4><?php echo e($blog->title); ?></h4>
                                    <ul class="list-inline blog-details-list">
                                        <li><a href="<?php echo e(route('blogs.author', strtolower($blog->createdBy->name))); ?>"><?php echo e($blog->createdBy->name); ?>

                                            </a>
                                        </li>
                                        <li><a href="javascript:void(0)"><?php echo e($blog->created_at->format('d M')); ?></a></li>
                                        <li><a href="javascript:void(0)">><?php echo e(__('25 comments')); ?></a></li>
                                        <li><a href="javascript:void(0)"><?php echo e(__('3 View')); ?></a></li>
                                    </ul>
                                </div>
                                <?php echo $blog->content; ?>

                            </div>
                        </div>
                    </div>
                    <div class="blog-divider"></div>
                    <div class="col-md-10 offset-md-1 leave-coment">
                        <h3 class="text-center">Leave Your Comment</h3>
                        <?php echo Form::open([
                            // 'route' => 'blog.comment',
                            'method' => 'POST',
                            'class' => 'theme-form p-0 mt-3 form-show',
                            'enctype' => 'multipart/form-data',
                        ]); ?>

                        <?php echo Form::hidden('blog_id', $blog->id, ['class' => 'form-control']); ?>

                        <?php echo Form::hidden('user_id', auth()->user()->id, ['class' => 'form-control']); ?>

                        <?php echo Form::hidden('parent_id', null, ['class' => 'form-control', 'id' => 'parent_id']); ?>


                        <?php if($theme->required_name_email == true): ?>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 md-fgrup-margin">
                                        <?php echo Form::text('name', auth()->user()->name, [
                                            'class' => 'form-control',
                                            'placeholder' => 'your name',
                                        ]); ?>

                                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong> <?php echo e($message); ?> </strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <?php echo Form::email('email', auth()->user()->email, [
                                            'class' => 'form-control',
                                            'placeholder' => 'your email',
                                        ]); ?>

                                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong> <?php echo e($message); ?> </strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <?php echo Form::textarea('message', null, [
                                'class' => 'form-control',
                                'placeholder' => 'your message',
                                'rows' => '6',
                                'id' => 'message',
                            ]); ?>

                            <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong> <?php echo e($message); ?> </strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-button">
                            <?php echo Form::submit(__('static.save'), ['class' => 'btn btn-theme theme-color']); ?>

                        </div>
                        <?php echo Form::close(); ?>

                    </div>
                    <?php if($theme->comment_approved == false): ?>
                        <div class="col-12">
                            <ul class="comment-profile-list">
                                <?php $__currentLoopData = $blog->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <div class="comment-profile-box">
                                            <div class="reply-box">
                                                <i class="fa fa-reply"></i>
                                                <a class="comment-reply" href="javascript:void(0)"
                                                    id="<?php echo e($comment->id); ?>"><span>Reply</span></a>
                                            </div>
                                            <div class="name-profile">
                                                <div class="profile-image">
                                                    <img src="<?php echo e(asset('upload/1aSNfyHYIWm9MRULUrEJyHKh27rsLTMdl77LxIBi.jpg')); ?>"
                                                        class="img-fluid" alt="">
                                                </div>
                                                <div class="profile-name">
                                                    <h5> <?php echo e($comment->name); ?> <span>
                                                            <?php echo e($comment->created_at->diffForHumans()); ?> </span>
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="reply-content">
                                                <?php echo e($comment->message); ?>

                                            </div>
                                        </div>
                                        <?php $__currentLoopData = $comment->replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <ul>
                                                <li>
                                                    <div class="comment-profile-box">
                                                        
                                                        <div class="name-profile">
                                                            <div class="profile-image">
                                                                <img src="<?php echo e(asset('upload/1aSNfyHYIWm9MRULUrEJyHKh27rsLTMdl77LxIBi.jpg')); ?>"
                                                                    class="img-fluid" alt="">
                                                            </div>
                                                            <div class="profile-name">
                                                                <h5> <?php echo e($reply->name); ?> <span>
                                                                        <?php echo e($comment->created_at->diffForHumans()); ?> </span>
                                                                </h5>
                                                            </div>
                                                        </div>
                                                        <div class="reply-content">
                                                            <p> <?php echo e($reply->message); ?> </p>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <div class="col-md-4 col-lg-3 order-md-first list-sidebar">
                        <?php echo $__env->make('frontend.layouts.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webiots/Desktop/Git_hub/chat_loop_OPTIMIZE_CODE/chat_loop/resources/views/frontend/single.blade.php ENDPATH**/ ?>