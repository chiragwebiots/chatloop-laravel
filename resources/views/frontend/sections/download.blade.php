@isset($section->content)
    <section class="download-bg">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 display-flex">
                    <div class="footer-logo">
                        <img class="img-fluid" src="{{ asset('frontend/images/logo.png') }}" alt="logo">
                    </div>
                </div>
                @isset($section->content['title'])
                    <div class="col-xl-5 display-flex">
                        <div class="download-text">
                            <h3>{{ $section->content['title'] }}</h3>
                        </div>
                    </div>
                @endisset
                <div class="col-xl-4 display-flex">
                    <div class="download-img">
                        <ul>
                            @isset($section->content['play_store_link'])
                                <li>
                                    <a href="{{ $section->content['play_store_link'] }}" target="_blank">
                                        <img class="img-fluid" src="{{ url('frontend/images/themes/default/images/app1.png') }}"
                                            alt="app1" data-tilt="" data-tilt-perspective="50" data-tilt-speed="350"
                                            data-tilt-max="1.8">
                                    </a>
                                </li>
                            @endisset
                            @isset($section->content['app_store_link'])
                                <li>
                                    <a href="{{ $section->content['app_store_link'] }}" target="_blank">
                                        <img class="img-fluid" src="{{ url('frontend/images/themes/default/images/app2.png') }}"
                                            alt="app2" data-tilt="" data-tilt-perspective="50" data-tilt-speed="350"
                                            data-tilt-max="1.8">
                                    </a>
                                </li>
                            @endisset
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endisset
