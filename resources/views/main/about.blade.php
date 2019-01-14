@extends('app')
@section('title')
{{ __('main.aboutest') }}
@endsection
@section('content')
<div class="row">
  <div class="col mx-auto m-4">
    <div class="card">
      <div class="card-header text-center">{{ __('main.ukect') }}</div>
      <div class="card-body">
        {{ __('main.ukectabout') }}
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm mx-auto m-2">
    <div class="card">
      <div class="card-header text-center">{{ __('main.aboutest') }}</div>
      <div class="card-body">
        <h3>{{ __('main.vision') }}</h3>
        <p>
          <ul>{{ __('main.visiontext') }}</ul>
        </p>
        <br>
        <h3>{{ __('main.message') }}</h3>
        <p>
          <ul>{{ __('main.messagetext') }}</ul>
        </p>
        <h3>{{ __('main.goals') }}</h3>
        <p>
          <ul>{{ __('main.goals1') }}</ul>
          <ul>{{ __('main.goals2') }}</ul>
          <ul>{{ __('main.goals3') }}</ul>
          <ul>{{ __('main.goals4') }}</ul>
        </p>
        
      </div>
    </div>
  </div>
</div>
@endsection