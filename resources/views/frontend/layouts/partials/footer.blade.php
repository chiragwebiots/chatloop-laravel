<!-- copy-right-section-->
<footer class="cpoy-right-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="social-footer">
                    <ul>
                        @forelse ($social_link as $social_links)
                            <li><a href="{{ $social_links->url }}"><i class="fa {{ $social_links->icon }}"
                                        aria-hidden="true"></i></a></li>
                        @empty
                            <li><a href="#"><i class="fa fa-info" aria-hidden="true"></i></a></li>
                            <span class="ms-3 h4">Social links not added</span>
                        @endforelse
                    </ul>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <p class="copyright">{{ isset($theme->copyright) ? $theme->copyright : null }}</p>
            </div>
        </div>
    </div>
</footer>
<!-- end copy right section-->
<!-- Tap to top-->
<div class="tap-top">
    <div><i class="fa fa-angle-up" aria-hidden="true"></i></div>
</div>
<!-- Tap to top end-->
<!-- facebook chat section start-->
<div id="fb-root"></div>
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src =
            'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js#xfbml=1&version=v2.12&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<!-- Your customer chat code-->
<div class="fb-customerchat" attribution="setup_tool" page_id="2123438804574660" theme_color="#5f57ea"
    logged_in_greeting="Hi! Welcome to PixelStrap Themes  How can we help you?"
    logged_out_greeting="Hi! Welcome to PixelStrap Themes  How can we help you?"></div>
<!-- facebook chat section end-->
