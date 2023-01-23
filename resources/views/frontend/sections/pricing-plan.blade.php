@if (count($plans))
    <section class="theme-bg" id="package">
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
                <div class="col-md-12 text-center">
                    <div class="plan-slider owl-carousel owl-theme">
                        @foreach ($plans as $plan)
                            {{-- @dd($plan->title, $plan->price, $plan->duration, $plan->content); --}}
                            <div class="item">
                                <div class="package-box">
                                    <h3>{{ $plan->title }}</h3>
                                    <div class="price-box">
                                        <span>{{ __('$') }}</span>
                                        <h2>{{ $plan->price }}</h2>
                                        <h5 class="plan-clr">
                                            <span class="d-block">{{ $plan->duration }}</span>
                                        </h5>
                                    </div>
                                    <div class="price-plan text-center">
                                        {!! $plan->content !!}
                                        <div class="price-plan-btn">{{ __('Select Plan') }}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
