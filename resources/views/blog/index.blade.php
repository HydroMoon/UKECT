@extends('app')
@section('title')
{{ 'المدونة' }}
@endsection
@section('jum')

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">مرحبا بك في مدونتنا</h1>
    <p class="lead">هنا سوف تجد جميع الاخبار المتعلقة بالمؤسسة البريطانية</p>
  </div>
</div>
@endsection

@section('content')


<div class="row">
  <div class="col-md-8">
    @foreach ($posts as $post)
    <div class="card mb-4">
      <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
      <div class="card-body">
        <h2 class="card-title">{{ $post->title }}</h2>
        <p class="card-text">{{ substr(strip_tags($post->body), 0, 300) }}{{ strlen(strip_tags($post->body)) > 300 ? "..." : "" }}</p>
        <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">أقراء المزيد</a>
      </div>
      <div class="card-footer text-muted">
        Posted on January 1, 2017 by
        <a href="#">Start Bootstrap</a>
      </div>
    </div>
    @endforeach

    <div class="row">
      <div class="center-block">
        {!! $posts->links() !!}
      </div>
    </div>


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
