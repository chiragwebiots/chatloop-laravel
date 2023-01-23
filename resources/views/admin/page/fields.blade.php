<ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active show" id="general-tab" data-bs-toggle="tab" href="#general" role="tab"
            aria-controls="general" aria-selected="true" data-original-title=""
            title="">{{ __('static.general') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="seo-tabs" data-bs-toggle="tab" href="#seo" role="tab" aria-controls="seo"
            aria-selected="false" data-original-title="" title="">{{ __('static.seo') }}</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade active show" id="general" role="tabpanel" aria-labelledby="general-tab">
        <div class="form-group row">
            {!! Form::label('title', __('static.title') . ' <span>*</span>', ['class' => 'col-xl-3 col-md-4'], false) !!}
            <div class="col-xl-8 col-md-7">
                {!! Form::text('title', isset($page->title) ? $page->title : old('title'), [
                    'class' => 'form-control title',
                    'id' => 'title',
                ]) !!}
                @error('title')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('slug', __('static.slug') . ' <span>*</span>', ['class' => 'col-xl-3 col-md-4'], false) !!}
            <div class="col-xl-8 col-md-7">
                <div class="input-group mb-3">
                    <span class="input-group-text">{{ url('/') }}/</span>
                    {!! Form::text('slug', isset($page->slug) ? $page->slug : old('slug'), [
                        'class' => 'form-control slug',
                        'id' => 'slug',
                    ]) !!}
                    @error('slug')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group row editor-label">
            {!! Form::label('content', __('static.content') . ' <span>*</span>', ['class' => 'col-xl-3 col-md-4'], false) !!}
            <div class="col-xl-8 col-md-7">
                <div class="editor-space">
                    {!! Form::textarea('content', isset($page->content) ? $page->content : old('content'), [
                        'class' => 'form-control content',
                    ]) !!}
                    @error('content')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('status', __('static.status') . ' <span>*</span>', ['class' => 'col-xl-3 col-md-4'], false) !!}
            <div class="col-xl-8 col-md-7">
                {{ Form::select('status', ['1' => 'Published', '2' => 'Draft'], isset($page->status) ? $page->status : old('status'), ['class' => 'form-control select-2', 'placeholder' => 'Select Status']) }}
                @error('status')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo-tabs">
        <div class="card snippet-preview" @if (!isset($page->meta_title) && !isset($page->meta_description)) style="display: none;" @endif>
            <div class="card-header">
                <h4 class="mb-0">
                    <i class="ti-eye me-2"></i>{{ __('Snippet Preview') }}
                </h4>
            </div>
            <div class="card-body">
                <h4 class="seo-title">
                    @isset($page->meta_title)
                        {{ $page->meta_title }}
                    @endisset
                </h4>
                @if (isset($page->meta_title))
                    <a href="{{ route('page', $page->slug) }}">
                        {{ url('page') }}/<span class="seo-slug">
                            @isset($page->slug)
                                {{ $page->slug }}
                            @endisset
                        </span>
                    </a>
                @else
                    <a href="javascript:void(0)">
                        {{ url('page') }}/<span class="seo-slug">
                            @isset($page->slug)
                                {{ $page->slug }}
                            @endisset
                        </span>
                    </a>
                @endif
                <p class="seo-description">
                    @isset($page->meta_description)
                        {{ $page->meta_description }}
                    @endisset
                </p>
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('meta_title', __('static.meta_title'), ['class' => 'col-12']) !!}
            <div class="col-12">
                {!! Form::text('meta_title', isset($page->meta_title) ? $page->meta_title : old('meta_title'), [
                    'class' => 'form-control',
                ]) !!}
                @error('meta_title')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row editor-label">
            {!! Form::label('meta_description', __('static.meta_description'), ['class' => 'col-12']) !!}
            <div class="col-12">
                {!! Form::textarea(
                    'meta_description',
                    isset($page->meta_description) ? $page->meta_description : old('meta_description'),
                    ['class' => 'form-control', 'rows' => 4],
                ) !!}
                @error('meta_description')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
</div>
