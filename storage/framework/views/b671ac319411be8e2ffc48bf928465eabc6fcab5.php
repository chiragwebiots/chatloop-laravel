<!-- Nav start-->
<nav class="navbar navbar-expand-lg theme-nav fixed-top">
    <div class="container">
        <a class="navbar-brand" href="<?php echo e(route('home')); ?>">
            <img class="img-fluid"
                src="<?php echo e(isset($theme->site_logo) ? url(\App\Helpers\Helpers::media($theme->site_logo)->url) : asset('frontend/images/logo.png')); ?>"
                alt="logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainmenu"
            aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"><i
                    class="fa fa-align-justify" aria-hidden="true"></i></span></button>
        <div class="collapse navbar-collapse" id="mainmenu">
            <ul class="navbar-nav ms-auto" id="mymenu">
                <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#about">about</a></li>
                <li class="nav-item"><a class="nav-link" href="#feature">feature</a></li>
                <li class="nav-item"><a class="nav-link" href="#screenshots">screenshot</a></li>
                <li class="nav-item"><a class="nav-link" href="#team">team</a></li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#news"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Blog</a>
                    <ul class="dropdown-menu">
                        <li class="nav-item"><a class="nav-link" href="blog.html">blog list</a></li>
                        <li class="nav-item"><a class="nav-link" href="blog-details.html">blog details</a></li>
                        <li class="nav-item"><a class="nav-link" href="blogs-leftside.html">leftsidebar</a></li>
                        <li class="nav-item"><a class="nav-link" href="blogs-rightside.html">rightsidebar</a></li>
                        <li class="nav-item"><a class="nav-link" href="blog-details-with-leftsidebar.html">details
                                leftsidebar</a></li>
                        <li class="nav-item"><a class="nav-link" href="blog-details-with-rightsidebar.html">details
                                rightsidebar</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="#contact">contact us</a></li>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Other Page</a>
                    <ul class="dropdown-menu">
                        <li class="nav-item"><a class="nav-link" href="sign-in.html">Sign In</a></li>
                        <li class="nav-item"><a class="nav-link" href="sign-up.html">Sign Up</a></li>
                        <li class="nav-item"><a class="nav-link" href="forgot-pass.html">Forget Password</a></li>
                        <li class="nav-item"><a class="nav-link" href="thank-you.html">Thank You</a></li>
                        <li class="nav-item"><a class="nav-link" href="review.html">Review</a></li>
                        <li class="nav-item"><a class="nav-link" href="faq.html">FAQ</a></li>
                        <li class="nav-item"><a class="nav-link" href="coming-soon.html">Coming Soon</a></li>
                        <li class="nav-item"><a class="nav-link" href="download.html">Download</a></li>
                        <li class="nav-item"><a class="nav-link" href="request.html">Request Demo</a></li>
                        <li class="nav-item"><a class="nav-link" href="404.html">404</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Nav end-->
<?php /**PATH /home/webiots/Desktop/Git_hub/chat_loop_OPTIMIZE_CODE/chat_loop/resources/views/frontend/layouts/partials/header.blade.php ENDPATH**/ ?>