@isset($section->content)
    <section class="theme-bg feature" id="feature">
        <div class="container">
            <div class="animation-circle-inverse"><i></i><i></i><i></i></div>
            <div class="row">
                @isset($section->content['title'])
                    <div class="col-md-12 text-center">
                        <div class="section-title">
                            <h2 class="text-white">{{ $section->content['title'] }}</h2>
                            <div class="line white"></div>
                        </div>
                    </div>
                @endisset
                <div class="col-lg-4 col-sm-6">
                    <div class="future-box">
                        <div class="future-timeline">
                            <ul>
                                @isset($section->content['feature_title_1'])
                                    <li class="timeline">
                                        <h4 class="sub-title">{{ $section->content['feature_title_1'] }}</h4>
                                        @isset($section->content['feature_description_1'])
                                            <p>{{ $section->content['feature_description_1'] }}</p>
                                        @endisset
                                    </li>
                                @endisset
                                @isset($section->content['feature_title_2'])
                                    <li class="timeline">
                                        <h4 class="sub-title">{{ $section->content['feature_title_2'] }}</h4>
                                        @isset($section->content['feature_description_2'])
                                            <p>{{ $section->content['feature_description_2'] }}</p>
                                        @endisset
                                    </li>
                                @endisset
                                @isset($section->content['feature_title_3'])
                                    <li class="timeline">
                                        <h4 class="sub-title">{{ $section->content['feature_title_3'] }}</h4>
                                        @isset($section->content['feature_description_3'])
                                            <p>{{ $section->content['feature_description_3'] }}</p>
                                        @endisset
                                    </li>
                                @endisset
                                @isset($section->content['feature_title_4'])
                                    <li class="timeline">
                                        <h4 class="sub-title">{{ $section->content['feature_title_4'] }}</h4>
                                        @isset($section->content['feature_description_4'])
                                            <p>{{ $section->content['feature_description_4'] }}</p>
                                        @endisset
                                    </li>
                                @endisset
                            </ul>
                        </div>
                    </div>
                </div>
                @isset($section->image)
                    <div class="col-md-4 future-mobile">
                        <img class="img-fluid" src="{{ url(\App\Helpers\Helpers::media($section->image)->url) }}"
                            alt="feature-mob">
                    </div>
                @endisset
                <div class="col-lg-4 col-sm-6">
                    <div class="future-box">
                        <div class="future-timeline-right">
                            <ul class="text-start">
                                @isset($section->content['feature_title_5'])
                                    <li class="timeline-right">
                                        <h4>{{ $section->content['feature_title_5'] }}</h4>
                                        @isset($section->content['feature_description_5'])
                                            <p>{{ $section->content['feature_description_5'] }}</p>
                                        @endisset
                                    </li>
                                @endisset
                                @isset($section->content['feature_title_6'])
                                    <li class="timeline-right">
                                        <h4>{{ $section->content['feature_title_6'] }}</h4>
                                        @isset($section->content['feature_description_6'])
                                            <p>{{ $section->content['feature_description_6'] }}</p>
                                        @endisset
                                    </li>
                                @endisset
                                @isset($section->content['feature_title_7'])
                                    <li class="timeline-right">
                                        <h4>{{ $section->content['feature_title_7'] }}</h4>
                                        @isset($section->content['feature_description_7'])
                                            <p>{{ $section->content['feature_description_7'] }}</p>
                                        @endisset
                                    </li>
                                @endisset
                                @isset($section->content['feature_title_8'])
                                    <li class="timeline-right">
                                        <h4>{{ $section->content['feature_title_8'] }}</h4>
                                        @isset($section->content['feature_description_8'])
                                            <p>{{ $section->content['feature_description_8'] }}</p>
                                        @endisset
                                    </li>
                                @endisset
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endisset
