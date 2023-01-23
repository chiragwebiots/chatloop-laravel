@if (count($teams))
    <section class="team-bg" id="team">
        <div class="animation-circle-inverse"><i></i><i></i><i></i></div>
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
                <div class="col-md-12">
                    <div class="team-slider owl-carousel owl-theme">
                        @foreach ($teams as $team)
                            <div class="item">
                                <div class="team-box">
                                    <div class="team-under-box">
                                        <div class="team-under-box-button text-white" id="{{ $team->id }}">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                        </div>
                                        <img class="img-fluid"
                                            src="{{ url(\App\Helpers\Helpers::media($team->image)->url) }}"
                                            alt="1">
                                        <div class="team-overlay">
                                            <div class="social-icon">
                                                <ul>
                                                    <li>
                                                        <a href="{{ $team->facebook_link }}" target="_blank">
                                                            <i class="fa fa-facebook" aria-hidden="true"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ $team->google_link }}" target="_blank">
                                                            <i class="fa fa-google-plus" aria-hidden="true"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ $team->twitter_link }}" target="_blank">
                                                            <i class="fa fa-twitter" aria-hidden="true"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ $team->instagram_link }}" target="_blank">
                                                            <i class="fa fa-instagram" aria-hidden="true"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ $team->rss_link }}" target="_blank">
                                                            <i class="fa fa-rss" aria-hidden="true"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @foreach ($teams as $team)
                    <div class="col-md-12">
                        <div class="team-hover" id="team-{{ $team->id }}">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="team-profile">
                                        <img class="img-fluid"
                                            src="{{ url(\App\Helpers\Helpers::media($team->image)->url) }}"
                                            alt="1">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="d-flex-1">
                                        <div class="hover-text">
                                            <div class="team-close-btn" id="{{ $team->id }}">
                                                <a>
                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                            <h3>{{ $team->name }}</h3>
                                            <h4 class="m-0 text-muted">{{ $team->designation }}</h4>
                                            <p>{{ $team->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
