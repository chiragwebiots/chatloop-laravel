@isset($data)

    @isset($edit)
        @can('update', $data)
            <a href="{{ route($edit, $data->id) }}"><i class="edit-icon ti-pencil-alt"></i></a>
        @endcan
    @endisset

    @isset($delete)
        @can('delete', $data)
            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#confirmationModal{{ $data->id }}">
                <i class="remove-icon ti-trash delete-confirmation"></i>
            </a>
            <!-- Delete Confirmation -->
            <div class="modal fade" id="confirmationModal{{ $data->id }}" tabindex="-1"
                aria-labelledby="confirmationModalLabel{{ $data->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmationModalLabel{{ $data->id }}">
                                {{ __('static.confirmation') }}
                            </h5>
                            {!! Form::button(null, ['class' => 'btn-close', 'data-bs-dismiss' => 'modal']) !!}
                        </div>
                        <div class="modal-body text-start">
                            {{ __('static.delete_message') }}
                        </div>
                        <div class="modal-footer">
                            {!! Form::open(['route' => [$delete, $data->id], 'method' => 'DELETE']) !!}

                            {!! Form::button(__('static.cancel'), ['class' => 'btn btn-secondary cancel', 'data-bs-dismiss' => 'modal']) !!}

                            {!! Form::submit(__('static.delete'), ['class' => 'btn btn-primary delete']) !!}

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        @endcan

        <!-- Multiple Select Delete Confirmation -->
        <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModal"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteConfirmationModal">
                            {{ __('static.confirmation') }}
                        </h5>
                    </div>
                    <div class="modal-body text-start">
                        {{ __('static.delete_message') }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary multi-delete-cancel" id="cancelModalBtn"
                            data-dismiss="modal">{{ __('static.cancel') }}</button>
                        <button type="button" class="btn btn-primary"
                            id="confirm-DeleteRows">{{ __('static.delete') }}</button>
                    </div>
                </div>
            </div>
        </div>
    @endisset

    @if (Auth::user()->cannot('update', $data) && Auth::user()->cannot('delete', $data))
        <p class="text-danger"><strong>{{ __('Access Denied') }}</strong></p>
    @endif

@endisset
