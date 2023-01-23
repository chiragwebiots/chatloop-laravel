@if (count($blogs))
    <section class="team-bg" id="news">
        <div class="animation-circle-inverse"><i></i><i></i><i></i></div>
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
                <div class="col-md-12">
                    <div class="news-slider owl-carousel owl-theme">
                        @foreach ($blogs as $blog)
                            <div class="item news-slid">
                                <div class="news-box">
                                    <img class="img-fluid"
                                        src="{{ url(\App\Helpers\Helpers::media($blog->image)->url) }}" alt="news-1">
                                    <div class="blog-hover">
                                        <h4>{{ $blog->title }}</h4>
                                        <ul class="list-inline blog-details-list">
                                            <li><a
                                                    href="{{ route('blogs.author', strtolower($blog->createdBy->name)) }}">{{ $blog->createdBy->name }}</a>
                                            </li>
                                            <li><a href="javascript:void(0)">{{ $blog->created_at->format('d M') }}</a>
                                            </li>
                                            <li><a href="javascript:void(0)">{{ __('25 comments') }}</a></li>
                                            <li><a href="javascript:void(0)">{{ __('3 View') }}</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="news-text">
                                    <p>{{ $blog->excerpt }}</p>
                                    <a href="{{ route('blog.details', $blog->slug) }}"
                                        class="btn-theme">{{ __('View more') }}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
