@extends('app')
@section('title')
{{ 'المدونة' }}
@endsection
@section('jum')

<div class="jumbotron jumbotron-fluid peach-gradient">
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
      <div class="card-body">
        <h2 class="card-title">{{ $post->title }}</h2>
        <p class="card-text">{{ mb_substr(strip_tags($post->body), 0, 300) }}{{ strlen(strip_tags($post->body)) > 300 ? "..." : "" }}</p>
        <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">أقراء المزيد</a>
      </div>
      <div class="card-footer text-muted">
        <div class="" style="direction:ltr;">
          ({{ date_format($post->created_at, 'd/m/Y g:i A') }}) تم النشر في
          {{-- <a href="#">Start Bootstrap</a> --}}
        </div>
      </div>
    </div>
    @endforeach

    <div class="row">
      <div class="mx-auto">
        {{ $posts->links("pagination::bootstrap-4") }}
      </div>
    </div>


  </div>

  <div class="col-md-4 mb-4">
    <div class="card">
      <h5 class="card-header">الوسائط</h5>
      <div class="card-body">
        سوف تكون جميع الوسائط موجودة هنا
      </div>
    </div>
  </div>

</div>
@endsection
