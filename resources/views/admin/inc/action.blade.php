@isset($data)

    @isset($edit)
        @can($edit)
            <a href="{{ route($edit, $data->id) }}"><i class="edit-icon ti-pencil-alt"></i></a>
        @endcan
    @endisset

    @isset($select)
        @can($select)
            <input type="checkbox" name="row" class="rowClass" value="{{ $data->id }}" id="rowId' . {{ $data->id }} . '">
        @endcan
    @endisset
    
    @if($theme->comment_approved) 
        @isset($toggle)
            @can($toggle)
             <form method="PUT">
                        <div class="form-check form-switch">
                            <input class="form-check-input" name="is_approved" type="checkbox" value="{{ $data->id }}" id="is_approved"@if ($data->is_approved == true) checked @endif @if(!$theme->comment_approved) disabled @endif>
                        </div>
                </form>
            @endcan
        @endisset
    @endif

    @isset($delete)
        @can($delete)
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

@endisset
