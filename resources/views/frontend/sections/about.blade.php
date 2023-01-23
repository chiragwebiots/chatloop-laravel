@isset($section->content)
    <section class="pb-0 about" id="about">
        <div class="about-chat">
            <div class="container">
                <div class="row">
                    @isset($section->content['title'])
                        <div class="col-md-12 text-center">
                            <div class="section-title">
                                <h2>{{ $section->content['title'] }}</h2>
                                <div class="line"></div>
                            </div>
                        </div>
                    @endisset
                    <div class="col-md-12 about-box">
                        <div class="row">
                            @isset($section->content['content1'])
                                <div class="col-lg-3 col-sm-6 about-border">
                                    <div class="chat-box">
                                        @isset($section->content['icon1'])
                                            <img src="{{ url(\App\Helpers\Helpers::media($section->content['icon1'])->url) }}"
                                                alt="stay-connected">
                                        @endisset
                                        <h3 class="sub-title">{{ $section->content['content1'] }}</h3>
                                    </div>
                                </div>
                            @endisset
                            @isset($section->content['content2'])
                                <div class="col-lg-3 col-sm-6 about-border">
                                    <div class="chat-box">
                                        @isset($section->content['icon2'])
                                            <img src="{{ url(\App\Helpers\Helpers::media($section->content['icon2'])->url) }}"
                                                alt="get-notified">
                                        @endisset
                                        <h3 class="sub-title">{{ $section->content['content2'] }}</h3>
                                    </div>
                                </div>
                            @endisset
                            @isset($section->content['content3'])
                                <div class="col-lg-3 col-sm-6 about-border">
                                    <div class="chat-box">
                                        @isset($section->content['icon3'])
                                            <img src="{{ url(\App\Helpers\Helpers::media($section->content['icon3'])->url) }}"
                                                alt="stay-updated">
                                        @endisset
                                        <h3 class="sub-title">{{ $section->content['content3'] }}</h3>
                                    </div>
                                </div>
                            @endisset
                            @isset($section->content['content4'])
                                <div class="col-lg-3 col-sm-6">
                                    <div class="chat-box">
                                        @isset($section->content['icon4'])
                                            <img src="{{ url(\App\Helpers\Helpers::media($section->content['icon4'])->url) }}"
                                                alt="mini-world">
                                        @endisset
                                        <h3 class="sub-title">{{ $section->content['content4'] }}</h3>
                                    </div>
                                </div>
                            @endisset
                        </div>
                    </div>
                    @isset($section->content['sub_title'])
                        <div class="col-md-12">
                            <div class="chat-slide">
                                <h3>{{ $section->content['sub_title'] }}</h3>
                            </div>
                        </div>
                    @endisset
                </div>
            </div>
        </div>
        @isset($section->image)
            <div class="container-fluid text-center">
                <img class="img-fluid full-banner" src="{{ url(\App\Helpers\Helpers::media($section->image)->url) }}"
                    alt="banner.png">
            </div>
        @endisset
    </section>
@endisset
