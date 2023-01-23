<div class="roles">
    <div class="card-header">
        <h5>{{ isset($role) ? __('static.roles.edit') : __('static.roles.add') }}</h5>
    </div>
    <div class="card-body">
        <div class="form-group row">
            {!! Form::label('name', __('static.name') . ' <span>*</span>', ['class' => 'col-xl-3 col-md-4'], false) !!}
            <div class="col-xl-8 col-md-7">
                {!! Form::text('name', isset($role->name) ? $role->name : old('name'), ['class' => 'form-control']) !!}
                @error('name')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
</div>
<div class="permission">
    <div class="card-header">
        <h5>{{ __('Permissions') }}</h5>
    </div>
    <div class="card-body">
        <div class="permision-section">
            <ul>
                @foreach (\App\Helpers\Helpers::modules() as $key => $module)
                    <li>
                        <h5>{{ $module->name }}:</h5>
                        <div class="form-group m-checkbox-inline mb-0 d-flex">
                            @php
                                $permissions = isset($role)
                                    ? $role
                                        ->getAllPermissions()
                                        ->pluck('name')
                                        ->toArray()
                                    : [];
                            @endphp
                            <label class="d-block" for="all-{{ $module->name }}">
                                {!! Form::checkbox(null, $module->name, false, [
                                    'class' => 'checkbox_animated select-all-permission',
                                    'id' => 'all-' . $module->name,
                                ]) !!}
                                {{ __('All') }}
                            </label>
                            @foreach ($module->actions as $action => $permission)
                                <label class="d-block" for="{{ $permission }}">
                                    {!! Form::checkbox('permissions[]', $permission, in_array($permission, $permissions) ? true : false, [
                                        'class' => 'checkbox_animated module_' . $module->name,
                                        'id' => $permission,
                                    ]) !!}
                                    {{ $action }}
                                </label>
                            @endforeach

                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
