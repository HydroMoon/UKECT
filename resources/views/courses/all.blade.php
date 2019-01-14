@extends('app')
@section('title')

@endsection

@section('content')
<h3 class="m-3 text-center">{{ __('home.shortc') }}</h3>
<div class="row mx-auto">
        
        @foreach ($short as $item)
        <div class="col-sm-3 card card-default m-2 d-flex flex-column">
            <div class="card-body">
                <h5 class="text-center">{{ $item->cname }}</h5>
                <div>
                    <p>{{ $item->teacher }}</p>
                    <p>{{ __('ukect.price') }}: {{ $item->price }} {{ __('ukect.sdg') }}</p>
                    <hr>
                    <p class="text-center">{{ __('words.from') }} {{ $item->start }}</p>
                    <p class="text-center">{{ __('words.to') }} {{ $item->finish }}</p>
                    <hr>
                    <p class="text-center">{{ $item->info }}</p>
                </div>
                <a class="mt-auto btn btn-secondary btn-block" href="{{ route('user.short') }}">{{ __('ukect.reg') }}</a>
            </div>
        </div>
        @endforeach
</div>
<h3 class="m-3 text-center">{{ __('home.longc') }}</h3>
<div class="row">
        
        @foreach ($long as $item)
        <div class="col-sm-3 card card-default m-2 d-flex flex-column">
            <div class="card-body">
                <h5 class="text-center">{{ $item->cname }}</h5>
                <h6 class="text-center">{{ $item->ctype }}</h6>
                <div>
                    <p>{{ $item->teacher }}</p>
                    <hr>
                    <p class="text-center">{{ $item->duration }}</p>
                    <hr>
                    <p class="text-center">{{ $item->info }}</p>
                </div>
                <a class="mt-auto btn btn-secondary btn-block" href="{{ route('user.long') }}">{{ __('ukect.reg') }}</a>
            </div>
        </div>
        @endforeach
</div>
@endsection