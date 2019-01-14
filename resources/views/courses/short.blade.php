@extends('app')
@section('title')
{{ __('ukect.ukectn') }}
@endsection
@section('jum')

<div class="jumbotron jumbotron-fluid peach-gradient">
  <div class="container">
    <h1 class="display-4">{{ __('ukect.ukect') }}</h1>
    <p class="lead">{{ __('ukect.ukectabout') }}</p>
  </div>
</div>
@endsection

@section('content')

<div class="row">
  <div class="col-sm mb-4">
    <section class="customer-logos slider" dir="ltr">
      @foreach ($short as $item)
      <div class="slide">
        <div class="card card-default slide-card">
          <div class="card-body">
            <h5 class="text-center">{{ $item->cname }}</h5>
            <div>
              <p>{{ $item->teacher }}</p>
              <p>{{ __('ukect.price') }}: {{ $item->price }} {{ __('ukect.sdg') }}</p>
              <hr>
              <p class="text-center">{{ __('words.from') }} {{ $item->start }}</p>

              <p class="text-center">{{ __('words.to') }} {{ $item->finish }}</p>
            </div>
            <a class="btn btn-secondary btn-block m-1" href="{{ route('user.short') }}">{{ __('ukect.reg') }}</a>
          </div>
        </div>
      </div>
      @endforeach
    </section>
  </div>
</div>



@endsection

@section('sec2')
<section class="" style="background: #f9f9f9; border: 1px solid #e6e6e6;">
  <div class="container">
    <div class="row">
      <div class="col-sm m-2">
        <br>
        <h3>{{ __('ukect.vision') }}</h3>
        <p>
          <ul>{{ __('ukect.visiontext') }}</ul>
        </p>
        <h3>{{ __('ukect.message') }}</h3>
        <p>
          <ul>{{ __('ukect.messagetext') }}</ul>
        </p>
        <h3>{{ __('ukect.goals') }}</h3>
        <p>
          <ul>{{ __('ukect.goals1') }}</ul>
          <ul>{{ __('ukect.goals2') }}</ul>
          <ul>{{ __('ukect.goals3') }}</ul>
          <ul>{{ __('ukect.goals4') }}</ul>
        </p>
        <h3>{{ __('ukect.certapprove') }}</h3>
        <p>{{ __('ukect.certtext') }}</p>
        <hr>
        <h3>{{ __('ukect.progs') }}</h3>
        <p>
          <ul>{{ __('ukect.progs1') }}</ul>
          <ul>{{ __('ukect.progs2') }}</ul>
          <ul>{{ __('ukect.progs3') }}</ul>
          <ul>{{ __('ukect.progs4') }}</ul>
          <ul>{{ __('ukect.progs5') }}</ul>
          <ul>{{ __('ukect.progs6') }}</ul>
          <ul>{{ __('ukect.progs7') }}</ul>
        </p>
      </div>
    </div>
  </div>
</section>
@endsection