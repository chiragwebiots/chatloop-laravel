@if (count($faqs))
    <section class="theme-bg faq" id="faq">
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
            <div class="row faq-row">
                @php
                    $left = false;
                    if (isset($section->content['image_align'])) {
                        $left = $section->content['image_align'] == 'left' ? true : false;
                    }
                @endphp
                <div
                    class="@if (isset($section->image)) col-lg-6 @else col-lg-12 @endif @if ($left) order-1 @endif">
                    <div class="accordion" id="accordionExample">
                        @foreach ($faqs as $key => $result)
                            <div class="card mb-3">
                                <div class="card-header" id="heading-{{ $result->id }}">
                                    <h5 class="mb-0">
                                        <button class="faq-link" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse-{{ $result->id }}" aria-expanded="false"
                                            aria-controls="collapse-{{ $result->id }}">
                                            {{ $result->title }} <i class="fa fa-angle-down pull-right"></i>
                                        </button>
                                    </h5>
                                </div>
                                <div @if ($loop->first) class="collapse show" @else class="collapse" @endif
                                    id="collapse-{{ $result->id }}" aria-labelledby="heading-{{ $result->id }}"
                                    data-parent="#accordionExample">
                                    <div class="card-body">{{ $result->description }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @isset($section->image)
                    <div class="col-lg-6 text-center @if ($left) order-0 @endif">
                        <img class="img-fluid" src="{{ url(\App\Helpers\Helpers::media($section->image)->url) }}"
                            alt="">
                    </div>
                @endisset
            </div>
        </div>
    </section>
@endisset
