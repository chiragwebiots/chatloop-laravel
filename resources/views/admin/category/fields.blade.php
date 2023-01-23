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
                {!! Form::text('title', isset($cat->title) ? $cat->title : old('title'), [
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
                    {!! Form::text('slug', isset($cat->slug) ? $cat->slug : old('slug'), [
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
                {!! Form::textarea('description', isset($cat->description) ? $cat->description : old('description'), [
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
            {!! Form::label('parent', __('Parent'), ['class' => 'col-xl-3 col-md-4']) !!}
            <div class="col-xl-8 col-md-7">
                {{ Form::select('parent', $categories->getHierarchy(), isset($cat->parent_id) ? $cat->parent_id : old('parent'), ['class' => 'form-control select-2', 'placeholder' => 'Select Parent Category']) }}
                @error('Parent')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('status', __('static.status') . ' <span>*</span>', ['class' => 'col-xl-3 col-md-4'], false) !!}
            <div class="col-xl-8 col-md-7">
                {{ Form::select('status', ['1' => 'Active', '0' => 'Inactive'], isset($cat->status) ? $cat->status : old('status'), ['class' => 'form-control select-2', 'placeholder' => 'Select Status']) }}
                @error('status')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo-tabs">
        <div class="card snippet-preview" @if (!isset($cat->meta_title) && !isset($cat->meta_description)) style="display: none;" @endif>
            <div class="card-header">
                <h4 class="mb-0">
                    <i class="ti-eye me-2"></i>{{ __('Snippet Preview') }}
                </h4>
            </div>
            <div class="card-body">
                <h4 class="seo-title">
                    @isset($cat->meta_title)
                        {{ $cat->meta_title }}
                    @endisset
                </h4>
                <a href="javascript:void(0)">
                    {{ route('home') }}/<span class="seo-slug">
                        @isset($cat->slug)
                            {{ $cat->slug }}
                        @endisset
                    </span>
                </a>
                <p class="seo-description">
                    @isset($cat->meta_description)
                        {{ $cat->meta_description }}
                    @endisset
                </p>
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('meta_title', __('static.meta_title'), ['class' => 'col-12']) !!}
            <div class="col-12">
                {!! Form::text('meta_title', isset($cat->meta_title) ? $cat->meta_title : old('meta_title'), [
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
                    isset($cat->meta_description) ? $cat->meta_description : old('meta_description'),
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
