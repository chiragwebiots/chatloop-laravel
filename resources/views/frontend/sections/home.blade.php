@isset($section->content)
    <section class="slide-bg slide-bg--top" id="home">
        <div class="animation-circle"><i></i><i></i><i></i></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="d-flex-1">
                        <div class="slide-text">
                            <div>
                                @isset($section->content['title'])
                                    <h1>{{ $section->content['title'] }} <span class="main-title">
                                            {{ $section->content['sub_title'] }}</span></h1>
                                @endisset
                                @isset($section->content['description'])
                                    <h4>{{ $section->content['description'] }}</h4>
                                @endisset
                                <div class="slid-btn">
                                    @isset($section->content['play_store_link'])
                                        <a href="{{ $section->content['play_store_link'] }}" target="_blank">
                                            <img class="img-fluid"
                                                src="{{ url('frontend/images/themes/default/images/app1.png') }}" alt="app1"
                                                data-tilt="" data-tilt-perspective="50" data-tilt-speed="350"
                                                data-tilt-max="1.8">
                                        </a>
                                    @endisset
                                    @isset($section->content['app_store_link'])
                                        <a href="{{ $section->content['app_store_link'] }}" target="_blank">
                                            <img class="img-fluid"
                                                src="{{ url('frontend/images/themes/default/images/app2.png') }}" alt="app2"
                                                data-tilt="" data-tilt-perspective="50" data-tilt-speed="350"
                                                data-tilt-max="1.8">
                                        </a>
                                    @endisset
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    @isset($section->image)
                        <div class="home-right">
                            <div class="mobile-slid"><img class="img-fluid"
                                    src="{{ url(\App\Helpers\Helpers::media($section->image)->url) }}" alt="top1"></div>
                            <div class="profile-msg"><img class="img-fluid"
                                    src="{{ url('frontend/images/themes/default/images/top2.png') }}" alt="top2"></div>
                            <div class="awesome"><img class="img-fluid"
                                    src="{{ url('frontend/images/themes/default/images/top3.png') }}" alt="top3"></div>
                            <div class="profile-1"><img class="img-fluid"
                                    src="{{ url('frontend/images/themes/default/images/top4.png') }}" alt="top4"></div>
                            <div class="emoji"><img class="img-fluid"
                                    src="{{ url('frontend/images/themes/default/images/top5.png') }}" alt="top5"></div>
                            <div class="profile-2"><img class="img-fluid"
                                    src="{{ url('frontend/images/themes/default/images/top1.png') }}" alt="top1"></div>
                        </div>
                    @endisset
                </div>
            </div>
        </div>
    </section>
@endisset
