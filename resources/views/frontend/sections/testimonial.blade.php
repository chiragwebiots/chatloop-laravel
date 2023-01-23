@if (count($testimonials))
    <section class="testimonial" id="testimonial">
        <div class="animation-circle-inverse"><i></i><i></i><i></i></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="testimonil-box">
                        <div class="testimonial-slider owl-carousel owl-theme">
                            @foreach ($testimonials as $testimonial)
                                <div class="item testi-profile">
                                    <div class="media">
                                        <div class="animated-circle">
                                            <img class="img-fluid align-self-center"
                                                src="{{ url(\App\Helpers\Helpers::media($testimonial->image)->url) }}"
                                                alt="1">
                                        </div>
                                        <div class="media-body">
                                            <h3 class="mt-0 sub-title">{{ $testimonial->name }}</h3>
                                            <p>{{ $testimonial->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
