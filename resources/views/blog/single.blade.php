@extends('app')
@section('title')
{{ $post->title }}
@endsection
@section('content')
<div class="row">
  <div class="col-md-8">




    <h1 class="mt-4">{{ $post->title }}</h1>

    <!-- Author -->
    <p class="lead">
      by
      <a href="#">Start Bootstrap</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p>Posted on January 1, 2018 at 12:00 PM</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-fluid rounded" src="lol900x300.jpg" alt="">

    <hr>
    {!! $post->body !!}

  </div>
  <div class="col-md-4">
    <div class="card my-4">
      <h5 class="card-header">الوسائط</h5>
      <div class="card-body">
        سوف تكون جميع الوسائط موجودة هنا
      </div>
    </div>
  </div>
</div>
@endsection
