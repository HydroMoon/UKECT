@extends('app')
@section('jum')
<header>
  <div id="Slider" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#Slider" data-slide-to="0" class="active"></li>
      <li data-target="#Slider" data-slide-to="1"></li>
      <li data-target="#Slider" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <!-- Slide One - Set the background image for this slide in the line below -->
      <img class="carousel-item active img-fluid" src="https://leadersuae.net/storage/slides/June2018/KFoC5DzkDy5YBKwihGA7.jpg">
      <!-- Slide Two - Set the background image for this slide in the line below -->
      <img class="carousel-item img-fluid" src="https://leadersuae.net/storage/slides/June2018/KFoC5DzkDy5YBKwihGA7.jpg">
      <!-- Slide Three - Set the background image for this slide in the line below -->
      <img class="carousel-item img-fluid" src="https://leadersuae.net/storage/slides/June2018/KFoC5DzkDy5YBKwihGA7.jpg">
    </div>
    <a class="carousel-control-prev" href="#Slider" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#Slider" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</header>
<div class="jumbotron jumbotron-fluid" style="background: #fff9c4;">
  <div class="container">
    <h2>المؤسسة البريطانيه للإستشارات والتدريب</h2>
    <p>المؤسسة العملاقة التي أنشئت للاسهام في مجالي التعليم والتدريب وتتميز بأنها تقدم برامج دولية علي مستوي عالي الجودة وبرامج محلية ودورات محلية تسهم في تدريب الفئات العاملة وغير العاملة</p>
  </div>
</div>
@endsection


@section('content')


@endsection

@section('sec')
    <section>
      <div class="container">
          <div class="row mb-4">
              <a class="col-sm btn btn-outline-warning waves-effect" href="{{ route('short') }}">الكورسات قصيرة الامد</a>
            
              <a class="col-sm btn btn-outline-warning waves-effect" href="{{ route('long') }}">الكورسات طويلة الامد</a>
            
              <a class="col-sm btn btn-outline-warning waves-effect" href="#">متابعة التسجيل</a>
            </div>
      </div>
    </section>

    <section style="background: #f9f9f9; border: 1px solid #e6e6e6;">
      <div class="container">
        <div class="row">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda, libero dolorem velit quis harum maxime. Ea possimus, voluptas fuga non impedit voluptatum sequi deserunt totam a nihil illo labore perferendis.
        </div>
      </div>
    </section>
@endsection
