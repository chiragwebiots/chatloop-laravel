<div class="form-group row">
    {!! Form::label('title', __('static.title') . ' <span>*</span>', ['class' => 'col-xl-3 col-md-4'], false) !!}
    <div class="col-xl-8 col-md-7">
        {!! Form::text('title', isset($faq->title) ? $faq->title : old('title'), ['class' => 'form-control']) !!}
        @error('title')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    {!! Form::label('description', __('Description') . ' <span>*</span>', ['class' => 'col-xl-3 col-md-4'], false) !!}
    <div class="col-xl-8 col-md-7">
        {!! Form::textarea('description', isset($faq->description) ? $faq->description : old('description'), [
            'class' => 'form-control',
        ]) !!}
        @error('description')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
