@extends('app')

@section('title')
{{ __('words.subjectname') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-sm m-3">
            <div class="card card-default">
                <div class="card-header">{{ __('words.subjectname') }}</div>
                <div class="card-body">
                    {!! $subject->subject !!}
                </div>
            </div>
        </div>
    </div>
@endsection