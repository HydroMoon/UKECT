@extends('app')
@section('title')
{{ __('user.title') }}
@endsection
@section('content')
<div class="row">
    <div class="col-sm m-3">
        <div class="card card-default">
            <div class="card-header">{{ __('user.title') }}</div>
            <div class="card-body">
                {{-- <ul>{{ __('user.reg') }}</ul> --}}
                <div class="row">
                    <div class="col-sm m-1">
                        <a class="btn btn-default btn-block" href="{{ route('user.courses.show', auth()->user()->spec_id) }}">{{ __('words.cou_qui') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection