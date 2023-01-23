@isset($data)
    @if (isset($type) && $type == 'Page')
        @if ($data->status == 0)
            <span class="badge bg-warning text-white">{{ __('Pending') }}</span>
        @endif
        @if ($data->status == 1)
            <span class="badge bg-success">{{ __('Published') }}</span>
        @endif
        @if ($data->status == 2)
            <span class="badge bg-info">{{ __('Draft') }}</span>
        @endif
    @else
        @if ($data->status == 0)
            <span class="badge bg-danger">{{ __('Inactive') }}</span>
        @endif
        @if ($data->status == 1)
            <span class="badge bg-success">{{ __('Active') }}</span>
        @endif
    @endif
@endisset
