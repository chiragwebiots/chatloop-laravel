@extends('install.layouts.master')
@section('title', 'Database')
@section('content')
    <div class="wizard-step-3 d-block">
        <form action="{{ route('install.database.config') }}" method="POST">
            @csrf
            @method('POST')
            <!-- {{ csrf_field() }} -->
            <div class="row">


                <div class="database-field col-md-6">
                    <h6>Please enter your database configuration details below.</h6>
                    <div class="form-group form-row">
                        <label class="col-lg-3">Host <span class="required-fill">*</span></label>
                        <div class="col-lg-9">
                            <input type="text" name="database[DB_HOST]"
                                value="{{ old('database.DB_HOST') ? old('database.DB_HOST') : '127.0.0.1' }}"
                                class="form-control" placeholder="127.0.0.1" autocomplete="off">
                            @if ($errors->has('database.DB_HOST'))
                                <span class="text-danger">{{ $errors->first('database.DB_HOST') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="col-lg-3">Port <span class="required-fill">*</span></label>
                        <div class="col-lg-9">
                            <input type="number" name="database[DB_PORT]"
                                value="{{ old('database.DB_PORT') ? old('database.DB_PORT') : '3306' }}"
                                class="form-control" placeholder="3306" autocomplete="off">
                            @if ($errors->has('database.DB_PORT'))
                                <span class="text-danger">{{ $errors->first('database.DB_PORT') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="col-lg-3">DB Username <span class="required-fill">*</span></label>
                        <div class="col-lg-9">
                            <input type="text" name="database[DB_USERNAME]" value="{{ old('database.DB_USERNAME') }}"
                                class="form-control" autocomplete="off">
                            @if ($errors->has('database.DB_USERNAME'))
                                <span class="text-danger">{{ $errors->first('database.DB_USERNAME') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="col-lg-3">DB Password <span class="required-fill">*</span></label>
                        <div class="col-lg-9">
                            <input type="password" name="database[DB_PASSWORD]" class="form-control" autocomplete="off">
                            @if ($errors->has('database.DB_PASSWORD'))
                                <span class="text-danger">{{ $errors->first('database.DB_PASSWORD') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="col-lg-3">Database Name<span class="required-fill">*</span></label>
                        <div class="col-lg-9">
                            <input type="text" name="database[DB_DATABASE]" value="{{ old('database.DB_DATABASE') }}"
                                class="form-control" autocomplete="off">
                            @if ($errors->has('database.DB_DATABASE'))
                                <span class="text-danger">{{ $errors->first('database.DB_DATABASE') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="database-field col-md-6">
                    <h6>Please enter your administration details below.</h6>
                    <div class="form-group form-row">
                        <label class="col-lg-3">First Name <span class="required-fill">*</span></label>
                        <div class="col-lg-9">
                            <input type="text" name="admin[first_name]" value="{{ old('admin.first_name') }}"
                                class="form-control" autocomplete="off">
                            @if ($errors->has('admin.first_name'))
                                <span class="text-danger">{{ $errors->first('admin.first_name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="col-lg-3">Last Name <span class="required-fill">*</span></label>
                        <div class="col-lg-9">
                            <input type="text" name="admin[last_name]" value="{{ old('admin.last_name') }}"
                                class="form-control" autocomplete="off">
                            @if ($errors->has('admin.last_name'))
                                <span class="text-danger">{{ $errors->first('admin.last_name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="col-lg-3">Email <span class="required-fill">*</span></label>
                        <div class="col-lg-9">
                            <input type="email" name="admin[email]" value="{{ old('admin.email') }}" class="form-control"
                                autocomplete="off">
                            @if ($errors->has('admin.email'))
                                <span class="text-danger">{{ $errors->first('admin.email') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="col-lg-3">Password <span class="required-fill">*</span></label>
                        <div class="col-lg-9">
                            <input type="password" name="admin[password]" class="form-control" autocomplete="off">
                            @if ($errors->has('admin.password'))
                                <span class="text-danger">{{ $errors->first('admin.password') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <label class="col-lg-3">Confirm Password <span class="required-fill">*</span></label>
                        <div class="col-lg-9">
                            <input type="password" name="admin[password_confirmation]" class="form-control"
                                autocomplete="off">
                            @if ($errors->has('admin.password_confirmation'))
                                <span class="text-danger">{{ $errors->first('admin.password_confirmation') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="next-btn d-flex">
            <a href="{{ route('install.license') }}" class="btn btn-primary"><i class="far fa-hand-point-left mr-2"></i>
                Previous</a>
            <a href="javascript:void(0)" class="btn btn-primary sumit-form">Next <i
                    class="far fa-hand-point-right ml-2"></i></a>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(".sumit-form").click(function() {
            $("form").submit();
        });
    </script>
@endsection
