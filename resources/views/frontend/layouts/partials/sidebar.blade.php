<div class="sidebar">
    <div class="sidebar-space">
        <h4 class="blog-title">{{ __('Categories') }}</h4>
        <div class="blog-divider"></div>
        <div class="blog-cat-detail">
            <ul>

                @foreach ($categories as $category)
                    <li class="marg-15">
                        <a href="{{ route('blogs.category', $category->slug) }}">
                            <i class="fa fa-angle-right" aria-hidden="true"></i> {{ $category->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="sidebar-space">
        <h4 class="blog-title">{{ __('Popular Tag') }}</h4>
        <div class="blog-divider"></div>
        <div class="tags marg-20">
            @foreach ($tags as $tag)
                <a href="{{ route('blogs.tag', $tag->slug) }}">
                    <span class="badge badge-theme">{{ $tag->title }}</span>
                </a>
            @endforeach
        </div>
    </div>
    <h4 class="blog-title">{{ __('Recent Posts') }}</h4>
    <div class="blog-divider"></div>
    <div class="recent-blog marg-20">
        @foreach ($blogs as $blog)
            <div class="media d-flex">
                <img class="me-3" src="{{ url(\App\Helpers\Helpers::media($blog->image)->url) }}" alt="blog">
                <div class="media-body">
                    <a href="{{ route('blog.details', $blog->slug) }}">
                        <h5 class="mt-0">{{ $blog->title }}</h5>
                    </a>
                    <p class="m-0">{{ $blog->created_at->format('d M') }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
