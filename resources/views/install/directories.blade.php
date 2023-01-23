@extends('install.layouts.master')
@section('title', 'Directories')
@section('content')
    <div class="wizard-step-2 d-block">
        <h6>Please make sure you have set the correct permissions for the directories listed below</h6>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Directories</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($directories as $directory => $isCheck)
                        <tr>
                            <td>{{ $directory }}</td>
                            <td class="icon-success">
                                <i class="fas fa-{{ $isCheck ? 'check' : 'times' }}"></i>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="next-btn d-flex">
            <a href="{{ route('install.requirements') }}" class="btn btn-primary prev1"><i
                    class="far fa-hand-point-left mr-2"></i> Previous</a>
            @if ($configured)
                <a href="{{ route('install.license') }}" class="btn btn-primary">Next <i
                        class="far fa-hand-point-right ml-2"></i></a>
            @else
                <a href="javascript:void(0)" class="btn btn-primary disabled">Next <i
                        class="far fa-hand-point-right ml-2"></i></a>
            @endif
        </div>
    </div>
@endsection
