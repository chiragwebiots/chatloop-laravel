<div class="form-group row">
    {!! Form::label(
        'name',
        __('static.social_links.name') . ' <span>*</span>',
        ['class' => 'col-xl-3 col-md-4'],
        false,
    ) !!}
    <div class="col-xl-8 col-md-7">
        {!! Form::text('name', isset($social_link->name) ? $social_link->name : old('name'), [
            'class' => 'form-control',
        ]) !!}
        @error('name')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    {!! Form::label('icon',__('static.social_links.icon') . ' <span>*</span>',
        ['class' => 'col-xl-3 col-md-4'],
        false,
    ) !!}
    <div class="col-xl-8 col-md-7">
        {!! Form::text('icon', isset($social_link->icon) ? $social_link->icon : old('icon'), [
            'class' => 'form-control',
        ]) !!}
        @error('icon')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    {!! Form::label(
        'url',
        __('static.social_links.url') . ' <span>*</span>',
        ['class' => 'col-xl-3 col-md-4'],
        false,
    ) !!}
    <div class="col-xl-8 col-md-7">
        {!! Form::text('url', isset($social_link->url) ? $social_link->url : old('url'), ['class' => 'form-control']) !!}
        @error('url')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
