@isset($section->content)
    <section class="contact" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="section-title">
                        <h2>Get In Touch</h2>
                    </div>
                    {!! Form::open([
                        'class' => 'auth-form',
                    ]) !!}
                    <div class="form-group">
                        {!! Form::label('name', __('static.name') . ' <span>*</span>', ['class' => 'col-xl-3 col-md-4'], false) !!}<i class="fa fa-user"></i>
                        {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'User name']) !!}
                        @error('name')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        {!! Form::label('email', __('static.email') . ' <span>*</span>', ['class' => 'col-xl-3 col-md-4'], false) !!}<i class="fa fa-envelope-o"></i>
                        {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                        @error('email')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        {!! Form::label('message', __('static.message') . ' <span>*</span>', ['class' => 'col-xl-3 col-md-4'], false) !!}<i class="fa fa-commenting-o"></i>
                        {!! Form::textarea('message', old('message'), [
                            'class' => 'form-control',
                            'placeholder' => 'Your Message',
                        ]) !!}
                        @error('message')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-0">
                        <button class="btn-theme" type="submit">Send Message</button>
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="col-md-6">
                    <div class="section-title">
                        <h2>{{ $section->content['title'] }}</h2>
                    </div>
                    <p>{{ $section->content['description'] }}</p>
                    <ul class="contact-box">
                        <li>
                            <div class="contact-circle"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                            <div class="contact-text">
                                <h3>Location</h3>
                                <p>{{ $section->content['location'] }}</p>
                            </div>
                        </li>
                        <li>
                            <div class="contact-circle"><i class="fa fa-phone" aria-hidden="true"></i></div>
                            <div class="contact-text">
                                <h3>Call US</h3>
                                <p>+91 {{ $section->content['call_us'] }}</p>
                            </div>
                        </li>
                        <li>
                            <div class="contact-circle"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                            <div class="contact-text">
                                <h3>Email Us</h3>
                                <p>{{ $section->content['email_us'] }}</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endisset
