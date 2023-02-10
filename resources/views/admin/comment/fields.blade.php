<ul class="nav nav-tabs tab-coupon" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active show" id="general-tab" data-bs-toggle="tab" href="#general" role="tab"
            aria-controls="general" aria-selected="true">
            {{ __('static.general') }}
        </a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade active show" id="general" role="tabpanel" aria-labelledby="general-tab">
        <div class="form-group row">
            {!! Form::label('name', __('static.name') . ' <span>*</span>', ['class' => 'col-xl-3 col-md-4'], false) !!}
            <div class="col-xl-8 col-md-7">
                {!! Form::text('name', isset($comment->name) ? $comment->name : old('name'), [
                    'class' => 'form-control title',
                    'id' => 'name',
                    'disabled' => 'disabled',
                ]) !!}
                @error('name')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('email', __('static.email') . ' <span>*</span>', ['class' => 'col-xl-3 col-md-4'], false) !!}
            <div class="col-xl-8 col-md-7">
                {!! Form::email('email', isset($comment->email) ? $comment->email : old('email'), [
                    'class' => 'form-control',
                    'disabled' => 'disabled',
                ]) !!}
                @error('email')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label('message', __('Message'), ['class' => 'col-xl-3 col-md-4']) !!}
            <div class="col-xl-8 col-md-7">
                {!! Form::textarea('message', isset($comment->message) ? $comment->message : old('message'), [
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
        @if ($theme->comment_approved)
            <div class="form-group row">
                {!! Form::label('is_approved', __('Approve') . ' <span>*</span>', ['class' => 'col-xl-3 col-md-4'], false) !!}
                <div class="col-xl-8 col-md-7">
                    <div class="editor-space">
                        <div class="form-group form-check form-switch">
                            {!! Form::checkbox('is_approved', true, $comment->is_approved == true ? true : '', [
                                'class' => 'form-check-input toggle-class',
                            ]) !!}
                        </div>
                        @error('is_approved')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
