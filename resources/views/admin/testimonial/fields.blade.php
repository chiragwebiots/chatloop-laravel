<div class="form-group row">
    {!! Form::label('name', __('static.name') . ' <span>*</span>', ['class' => 'col-xl-3 col-md-4'], false) !!}
    <div class="col-xl-8 col-md-7">
        {!! Form::text('name', isset($testimonial->name) ? $testimonial->name : old('name'), [
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
    {!! Form::label('designation', __('Designation') . ' <span>*</span>', ['class' => 'col-xl-3 col-md-4'], false) !!}
    <div class="col-xl-8 col-md-7">
        {!! Form::text(
            'designation',
            isset($testimonial->designation) ? $testimonial->designation : old('designation'),
            ['class' => 'form-control'],
        ) !!}
        @error('designation')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    {!! Form::label('description', __('Description') . ' <span>*</span>', ['class' => 'col-xl-3 col-md-4'], false) !!}
    <div class="col-xl-8 col-md-7">
        {!! Form::textarea(
            'description',
            isset($testimonial->description) ? $testimonial->description : old('description'),
            ['class' => 'form-control'],
        ) !!}
        @error('description')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
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
        {!! Form::hidden('image', isset($testimonial->image) ? $testimonial->image : old('image'), [
            'class' => 'selected-file',
        ]) !!}
        <div select="image" class="row upload-card selected-media selected-custom-row g-3 pt-3"></div>
    </div>
</div>
