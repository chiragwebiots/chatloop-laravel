@isset($section->content)
    <section class="work" id="work">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                    <div class="section-title">
                        @isset($section->content['title'])
                            <h2>{{ $section->content['title'] }}</h2>
                            <div class="line"></div>
                        @endisset
                        @isset($section->content['description'])
                            <p>{{ $section->content['description'] }}</p>
                        @endisset
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 text-center">
                    <div class="process-box">
                        @isset($section->content['icon_1'])
                            <svg>
                                <use xlink:href="../../../../frontend/svg/download.svg#download"></use>
                            </svg>
                        @endisset
                        @isset($section->content['title_1'])
                            <h3>{{ $section->content['title_1'] }}</h3>
                        @endisset
                        @isset($section->content['description_1'])
                            <p>{{ $section->content['description_1'] }}</p>
                        @endisset
                        @isset($section->content['icon_1'])
                            <svg class="bg-icon">
                                <use xlink:href="../../../../frontend/svg/download.svg#download"></use>
                            </svg>
                        @endisset
                    </div>
                </div>
                <div class="col-lg-4 text-center">
                    <div class="process-box">
                        @isset($section->content['icon_2'])
                            <svg>
                                <use xlink:href="../../../../frontend/svg/people.svg#people"></use>
                            </svg>
                        @endisset
                        @isset($section->content['title_2'])
                            <h3>{{ $section->content['title_2'] }}</h3>
                        @endisset
                        @isset($section->content['description_2'])
                            <p>{{ $section->content['description_2'] }}</p>
                        @endisset
                        @isset($section->content['icon_2'])
                            <svg class="bg-icon">
                                <use xlink:href="../../../../frontend/svg/people.svg#people"></use>
                            </svg>
                        @endisset
                    </div>
                </div>
                <div class="col-lg-4 text-center">
                    <div class="process-box">
                        @isset($section->content['icon_3'])
                            <svg>
                                <use xlink:href="../../../../frontend/svg/enjoy.svg#enjoy"></use>
                            </svg>
                        @endisset
                        @isset($section->content['title_3'])
                            <h3>{{ $section->content['title_3'] }}</h3>
                        @endisset
                        @isset($section->content['description_3'])
                            <p>{{ $section->content['description_3'] }}</p>
                        @endisset
                        @isset($section->content['icon_3'])
                            <svg class="bg-icon">
                                <use xlink:href="../../../../frontend/svg/enjoy.svg#enjoy"></use>
                            </svg>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </section>
@endisset
