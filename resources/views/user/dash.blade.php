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
                <ul>{{ __('user.reg') }}</ul>
                <div class="row">
                    <div class="col-sm m-1">
                        <a class="btn btn-default btn-block" href="{{ route('user.short') }}">{{ __('user.short') }}</a>
                    </div>
                    <div class="col-sm m-1">
                        <a class="btn btn-default btn-block" href="{{ route('user.long') }}">{{ __('user.long') }}</a>
                    </div>
                </div>
                <div class="m-1 text-center">
                    <a class="btn btn-default" href="{{ route('user.courses') }}">{{ __('words.coursestate') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection