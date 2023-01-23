<div class="form-group row">
    {!! Form::label('name', __('static.name') . ' <span>*</span>', ['class' => 'col-xl-3 col-md-4'], false) !!}
    <div class="col-xl-8 col-md-7">
        {!! Form::text('name', isset($team->name) ? $team->name : old('name'), ['class' => 'form-control']) !!}
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
        {!! Form::text('designation', isset($team->designation) ? $team->designation : old('designation'), [
            'class' => 'form-control',
        ]) !!}
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
        {!! Form::textarea('description', isset($team->description) ? $team->description : old('description'), [
            'class' => 'form-control',
        ]) !!}
        @error('description')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    {!! Form::label('facebook_link', __('Facebook Link'), ['class' => 'col-xl-3 col-md-4']) !!}
    <div class="col-xl-8 col-md-7">
        {!! Form::url('facebook_link', isset($team->facebook_link) ? $team->facebook_link : old('facebook_link'), [
            'class' => 'form-control',
        ]) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('google_link', __('Google Link'), ['class' => 'col-xl-3 col-md-4']) !!}
    <div class="col-xl-8 col-md-7">
        {!! Form::url('google_link', isset($team->google_link) ? $team->google_link : old('google_link'), [
            'class' => 'form-control',
        ]) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('twitter_link', __('Twitter Link'), ['class' => 'col-xl-3 col-md-4']) !!}
    <div class="col-xl-8 col-md-7">
        {!! Form::url('twitter_link', isset($team->twitter_link) ? $team->twitter_link : old('twitter_link'), [
            'class' => 'form-control',
        ]) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('instagram_link', __('Instagram Link'), ['class' => 'col-xl-3 col-md-4']) !!}
    <div class="col-xl-8 col-md-7">
        {!! Form::url('instagram_link', isset($team->instagram_link) ? $team->instagram_link : old('instagram_link'), [
            'class' => 'form-control',
        ]) !!}
    </div>
</div>
<div class="form-group row">
    {!! Form::label('rss_link', __('RSS Link'), ['class' => 'col-xl-3 col-md-4']) !!}
    <div class="col-xl-8 col-md-7">
        {!! Form::url('rss_link', isset($team->rss_link) ? $team->rss_link : old('rss_link'), [
            'class' => 'form-control',
        ]) !!}
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
        {!! Form::hidden('image', isset($team->image) ? $team->image : old('image'), ['class' => 'selected-file']) !!}
        <div select="image" class="row upload-card selected-media selected-custom-row g-3 pt-3"></div>
    </div>
</div>
