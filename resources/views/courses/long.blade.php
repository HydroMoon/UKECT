@extends('app')
@section('title')
{{ __('ukest.ukp') }}
@endsection
@section('jum')

<div class="jumbotron jumbotron-fluid peach-gradient">
    <div class="container">
        <h1 class="display-4">{{ __('ukest.ukest') }}</h1>
        <p class="lead">{{ __('ukest.ukestabout') }}</p>
    </div>
</div>
@endsection

@section('content')

<div class="row">
    <div class="col-sm mb-4">
        <section class="customer-logos slider" dir="ltr">
                @foreach ($long as $item)
                <div class="slide">
                    <div class="card card-default slide-card">
                      <div class="card-body">
                        <h5 class="text-center">{{ $item->cname }}</h5>
                        <h6 class="text-center">{{ $item->ctype }}</h6>
                        <div>
                          <p>{{ $item->teacher }}</p>
                          <hr>
                          <p class="text-center">{{ $item->duration }}</p>
                        </div>
                        <a class="btn btn-secondary btn-block m-1" href="{{ route('user.long') }}">{{ __('ukect.reg') }}</a>
                      </div>
                    </div>
                  </div>
                @endforeach
        </section>
    </div>
</div>

@endsection

@section('sec2')
<section style="background: #f9f9f9; border: 1px solid #e6e6e6;">
    <div class="container">
        <div class="row">
            <div class="col-sm m-2">
                <br>
                <h3 class="text-center">{{ __('ukest.approved') }}</h3>
                <p class="text-center">
                    {{ __('ukest.liver') }}
                        <br>
                        {{ __('ukest.metch') }}
                    </p>
                <hr>
                <p>{{ __('ukest.text') }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm m-2">
                <h3>{{ __('ukest.diploma') }}</h3>
                <p>
                    <ul>{{ __('ukest.p1') }}</ul>
                    <ul>{{ __('ukest.p2') }}</ul>
                    <ul>{{ __('ukest.p3') }}</ul>
                    <ul>{{ __('ukest.p4') }}</ul>
                    <ul>{{ __('ukest.p5') }}</ul>
                    <ul>{{ __('ukest.p6') }}</ul>
                    <ul>{{ __('ukest.p7') }}</ul>
                    <ul>{{ __('ukest.p8') }}</ul>
                </p>
            </div>
            <div class="col-sm m-2">
                <h3>{{ __('ukest.bsch') }}</h3>
                <p>
                    <ul>{{ __('ukest.p1') }}</ul>
                    <ul>{{ __('ukest.p2') }}</ul>
                    <ul>{{ __('ukest.p3') }}</ul>
                    <ul>{{ __('ukest.p4') }}</ul>
                    <ul>{{ __('ukest.p5') }}</ul>
                    <ul>{{ __('ukest.p6') }}</ul>
                    <ul>{{ __('ukest.p7') }}</ul>
                    <ul>{{ __('ukest.p8') }}</ul>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm m-2">
                <h3>{{ __('ukest.other') }}</h3>
                <p>{{ __('ukest.othertext') }}</p>
                <h3 class="text-center">{{ __('ukest.giver') }}</h3>
                <p class="text-center">
                    {{ __('ukest.metch') }}
                </p>
            </div>
        </div>
        <div class="row">
                <div class="col-sm m-2">
                    <h3>{{ __('ukest.certapprove') }}</h3>
                    <p>{{ __('ukest.certtext') }}</p>
                    <hr>
                    <h3>{{ __('ukest.condition') }}</h3>
                </div>
        </div>
        <div class="row">
            <div class="col-sm m-2">
                <h3>{{ __('ukest.dip') }}</h3>
<p>{{ __('ukest.dipt') }}</p>         
   </div>
            <div class="col-sm m-2">
                <h3>{{ __('ukest.bac') }}</h3>
<p>{{ __('ukest.bact') }}</p>       
     </div>
        </div>
        <div class="row">
                <div class="col-sm m-2">
                    <h3>{{ __('ukest.mas') }}</h3>
                    <p>{{ __('ukest.mast') }}</p>
                </div>
                <div class="col-sm m-2">
                    <h3>{{ __('ukest.doc') }}</h3>
<p>{{ __('ukest.doct') }}</p>   
             </div>
        </div>
    </div>
</section>
@endsection