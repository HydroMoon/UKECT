@extends('app')
@section('title')
{{ __('home.home') }}
@endsection
@section('jum')
<header>
  <div class="owl-car" dir="ltr">
      @foreach ($imgs as $key=>$item)
      <div>
        <img class="img-fluid" src="{{ asset('gallery/' . $item->image) }}">
      </div>
      @endforeach
  </div>
</header>
<div class="jumbotron jumbotron-fluid" style="background: #fff9c4;">
  <div class="container">
    <h2>{{ __('home.uk') }}</h2>
    <p>{{ __('home.ukabout') }}</p>
  </div>
</div>
@endsection


@section('content')


@endsection

@section('sec')
    <section>
      <div class="container">
          <div class="row mb-4">
              <a class="col-sm btn btn-outline-warning waves-effect" href="{{ route('short') }}">{{ __('home.ukect') }}</a>
            
              <a class="col-sm btn btn-outline-warning waves-effect" href="{{ route('long') }}">{{ __('home.ukest') }}</a>
            
              <a class="col-sm btn btn-outline-warning waves-effect" href="{{ route('user.dash') }}">{{ __('home.reg') }}</a>
            </div>
      </div>
    </section>

    <section style="background: #f9f9f9; border: 1px solid #e6e6e6;">
      <div class="container">
        <div class="row">
            <div class="col-sm m-2">
                <br>
                <h3 class="text-center">{{ __('ukest.approved') }}</h3>
                <p class="text-center">
                  {{ __('ukest.metch') }}
                        <br>
                        {{ __('ukest.liver') }}
                    </p>
                <hr>
                <p>{{ __('ukest.text') }}</p>
            </div>
            
        </div>
      </div>
    </section>
@endsection
