<div class="form-group row">
    {!! Form::label('title', __('static.title') . ' <span>*</span>', ['class' => 'col-xl-3 col-md-4'], false) !!}
    <div class="col-xl-8 col-md-7">
        {!! Form::text('title', isset($plan->title) ? $plan->title : old('title'), ['class' => 'form-control']) !!}
        @error('title')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    {!! Form::label('price', __('Price') . ' <span>*</span>', ['class' => 'col-xl-3 col-md-4'], false) !!}
    <div class="col-xl-8 col-md-7">
        {!! Form::text('price', isset($plan->price) ? $plan->price : old('price'), ['class' => 'form-control']) !!}
        @error('price')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    {!! Form::label('duration', __('Duration') . ' <span>*</span>', ['class' => 'col-xl-3 col-md-4'], false) !!}
    <div class="col-xl-8 col-md-7">
        {{ Form::select('duration', ['month' => 'Month', 'year' => 'Year'], isset($plan->duration) ? $plan->duration : old('duration'), ['class' => 'form-control select-2', 'placeholder' => 'Select Duration']) }}
        @error('duration')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    {!! Form::label('content', __('Content') . ' <span>*</span>', ['class' => 'col-xl-3 col-md-4'], false) !!}
    <div class="col-xl-8 col-md-7">
        {!! Form::textarea('content', isset($plan->content) ? $plan->content : old('content'), [
            'class' => 'form-control content',
        ]) !!}
        @error('content')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
