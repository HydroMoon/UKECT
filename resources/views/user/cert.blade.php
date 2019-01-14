@extends('app')
@section('title')
{{ __('words.certhead') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-sm m-3">
            <div class="card card-default">
                <div class="card-header">{{ __('words.certhead') }}</div>
                <div class="card-body text-center">
                    <img class="img-fluid" src="{{ asset('cert/' . $cert->cert) }}" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection