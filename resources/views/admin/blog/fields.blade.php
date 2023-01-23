<ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active show" id="general-tab" data-bs-toggle="tab" href="#general" role="tab"
            aria-controls="general" aria-selected="true">
            {{ __('static.general') }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="seo-tabs" data-bs-toggle="tab" href="#seo" role="tab" aria-controls="seo"
            aria-selected="false">
            {{ __('static.seo') }}
        </a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade active show" id="general" role="tabpanel" aria-labelledby="general-tab">
        <div class="form-group row">
            {!! Form::label('title', __('static.title') . ' <span>*</span>', ['class' => 'col-xl-3 col-md-4'], false) !!}
            <div class="col-xl-8 col-md-7">
                {!! Form::text('title', isset($blog->title) ? $blog->title : old('title'), [
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
                    {!! Form::text('slug', isset($blog->slug) ? $blog->slug : old('slug'), [
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
        <div class="form-group row">
            {!! Form::label('excerpt', __('Excerpt'), ['class' => 'col-xl-3 col-md-4']) !!}
            <div class="col-xl-8 col-md-7">
                {!! Form::textarea('excerpt', isset($blog->excerpt) ? $blog->excerpt : old('excerpt'), [
                    'class' => 'form-control',
                    'rows' => 4,
                ]) !!}
                @error('excerpt')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('content', __('static.content') . ' <span>*</span>', ['class' => 'col-xl-3 col-md-4'], false) !!}
            <div class="col-xl-8 col-md-7">
                <div class="editor-space">
                    {!! Form::textarea('content', isset($blog->content) ? $blog->content : old('content'), [
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
            {!! Form::label('image', __('Image') . ' <span>*</span>', ['class' => 'col-xl-3 col-md-4'], false) !!}
            <div class="col-xl-8 col-md-7">
                {!! Form::file('image', [
                    'class' => 'form-control media-manager',
                    'onclick' => 'return false',
                    'multiple' => false,
                ]) !!}
                {{-- <input type="file" id="image" name="image" class ="form-control media-manager"> --}}
                {!! Form::hidden('image', isset($blog->image) ? $blog->image : null, ['class' => 'selected-file']) !!}
                <div select="image" class="row upload-card selected-media selected-custom-row g-3 pt-3"></div>
            </div>
        </div>

        {{-- ----------------------------------------------------------------------------------------------------- --}}

        {{-- ------------------------------------------------------------------------------------------------------------- --}}
        <div class="form-group row">
            {!! Form::label('categories[]', __('Categories'), ['class' => 'col-xl-3 col-md-4']) !!}
            <div class="col-xl-8 col-md-7">
                {{ Form::select('categories[]', $categories, !empty($blog->selectedCategories) ? $blog->selectedCategories : [], ['class' => 'form-control select-2', 'multiple' => true]) }}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('tags[]', __('Tags'), ['class' => 'col-xl-3 col-md-4']) !!}
            <div class="col-xl-8 col-md-7">
                {{ Form::select('tags[]', $tags, !empty($blog->selectedTags) ? $blog->selectedTags : [], ['class' => 'form-control select-2', 'multiple' => true]) }}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('status', __('static.status') . ' <span>*</span>', ['class' => 'col-xl-3 col-md-4'], false) !!}
            <div class="col-xl-8 col-md-7">
                {{ Form::select('status', ['1' => 'Published', '2' => 'Draft'], isset($blog->status) ? $blog->status : old('status'), ['class' => 'form-control select-2', 'placeholder' => 'Select Status']) }}
                @error('status')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('featured', __('Featured'), ['class' => 'col-xl-3 col-md-4']) !!}
            <div class="col-xl-8 col-md-7">
                <div class="checkbox checkbox-primary">
                    {!! Form::checkbox('featured', null, isset($blog->featured) && $blog->featured ? true : false, [
                        'id' => 'featured',
                    ]) !!}
                    {!! Form::label('featured', __('static.enable')) !!}
                </div>
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('sticky', __('Stick to the top of the blog'), ['class' => 'col-xl-3 col-md-4']) !!}
            <div class="col-xl-8 col-md-7">
                <div class="checkbox checkbox-primary">
                    {!! Form::checkbox('sticky', null, isset($blog->sticky) && $blog->sticky ? true : false, ['id' => 'sticky']) !!}
                    {!! Form::label('sticky', __('static.enable')) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo-tabs">
        <div class="card snippet-preview" @if (!isset($blog->meta_title) && !isset($blog->meta_description)) style="display: none;" @endif>
            <div class="card-header">
                <h4 class="mb-0">
                    <i class="ti-eye me-2"></i>{{ __('Snippet Preview') }}
                </h4>
            </div>
            <div class="card-body">
                <h4 class="seo-title">
                    @isset($blog->meta_title)
                        {{ $blog->meta_title }}
                    @endisset
                </h4>
                @if (isset($blog->meta_title))
                    <a href="{{ route('blog.details', $blog->slug) }}" target="_blank">
                        {{ url('blog') }}/<span class="seo-slug">
                            @isset($blog->meta_title)
                                {{ $blog->slug }}
                            @endisset
                    </a>
                @else
                    <a href="javascript:void(0)">
                        {{ url('blog') }}/<span class="seo-slug">
                            @isset($blog->meta_title)
                                {{ $blog->slug }}
                            @endisset
                    </a>
                @endif
                <p class="seo-description">
                    @isset($blog->meta_description)
                        {{ $blog->meta_description }}
                    @endisset
                </p>
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('meta_title', __('static.meta_title'), ['class' => 'col-12']) !!}
            <div class="col-12">
                {!! Form::text('meta_title', isset($blog->meta_title) ? $blog->meta_title : old('meta_title'), [
                    'class' => 'form-control',
                ]) !!}
                @error('meta_title')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('meta_description', __('static.meta_description'), ['class' => 'col-12']) !!}
            <div class="col-12">
                {!! Form::textarea(
                    'meta_description',
                    isset($blog->meta_description) ? $blog->meta_description : old('meta_description'),
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
