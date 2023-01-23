@isset($section->content)
    <section class="theme-bg screenshots" id="screenshots">
        <div class="animation-circle"><i></i><i></i><i></i></div>
        <div class="container">
            <div class="row">
                @isset($section->content['title'])
                    <div class="col-md-12 text-center">
                        <div class="section-title">
                            <h2 class="text-white">{{ $section->content['title'] }}</h2>
                            <div class="line white"></div>
                        </div>
                    </div>
                @endisset
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="swiper-screenshots-container-1 swiper-container">
                        <div class="swiper-wrapper">
                            @if (!empty($section->image))
                                @foreach (explode(',', $section->image) as $image)
                                    <div class="swiper-slide">
                                        <img src="{{ url(\App\Helpers\Helpers::media($image)->url) }}">
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endisset
