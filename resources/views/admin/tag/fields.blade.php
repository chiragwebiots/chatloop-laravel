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
                {!! Form::text('title', isset($tag->title) ? $tag->title : old('title'), [
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
                    <span class="input-group-text">{{ route('home') }}/</span>
                    {!! Form::text('slug', isset($tag->title) ? $tag->slug : old('slug'), [
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
            {!! Form::label('description', __('Description'), ['class' => 'col-xl-3 col-md-4']) !!}
            <div class="col-xl-8 col-md-7">
                {!! Form::textarea('description', isset($tag->description) ? $tag->description : old('description'), [
                    'class' => 'form-control',
                    'rows' => 4,
                ]) !!}
                @error('description')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('status', __('static.status') . ' <span>*</span>', ['class' => 'col-xl-3 col-md-4'], false) !!}
            <div class="col-xl-8 col-md-7">
                {{ Form::select('status', ['1' => 'Active', '0' => 'Inactive'], isset($tag->status) ? $tag->status : old('status'), ['class' => 'form-control select-2', 'placeholder' => 'Select Status']) }}
                @error('status')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo-tabs">
        <div class="card snippet-preview" @if (!isset($tag->meta_title) && !isset($tag->meta_description)) style="display: none;" @endif>
            <div class="card-header">
                <h4 class="mb-0">
                    <i class="ti-eye me-2"></i>{{ __('Snippet Preview') }}
                </h4>
            </div>
            <div class="card-body">
                <h4 class="seo-title">
                    @isset($tag->meta_title)
                        {{ $tag->meta_title }}
                    @endisset
                </h4>
                <a href="javascript:void(0)">
                    {{ route('home') }}/<span class="seo-slug">
                        @isset($tag->meta_title)
                            {{ $tag->slug }}
                        @endisset
                </a>
                <p class="seo-description">
                    @isset($tag->meta_description)
                        {{ $tag->meta_description }}
                    @endisset
                </p>
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('meta_title', __('static.meta_title'), ['class' => 'col-12']) !!}
            <div class="col-12">
                {!! Form::text('meta_title', isset($tag->meta_title) ? $tag->meta_title : old('meta_title'), [
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
                    isset($tag->meta_description) ? $tag->meta_description : old('meta_description'),
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
