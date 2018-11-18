@extends('dash')
@section('title')
{{ $post->title }}
@endsection
@section('content')
<div class="row">
  <div class="col-lg-8">

    <h1 class="mt-4">{{ $post->title }}</h1>

    <p class="lead">
      تم النشر بواسطة
      <a href="#">د. قاسم محمد</a>
    </p>
    <hr>
    <p>Posted on January 1, 2018 at 12:00 PM</p>

    <hr>

    <img class="img-fluid rounded" src="https://www.stanhopestreetprimary.ie/wp-content/uploads/2013/11/900x300.png" alt="">

    <hr>

    <p class="lead">{!! $post->body !!}</p>

  </div>
  <div class="col-md-4">
    <div class="card my-4">
      <h5 class="card-header">المنشور</h5>
      <div class="card-body">
        <dl class="dl-horizontal mb-2">
  					<dt class="card-subtitle">رابط المنشور:</dt>
  					<a href="{{ route('blog.single', $post->slug) }}" class="link">{{ route('blog.single', $post->slug) }}</a>
  				</dl>

        <dl class="dl-horizontal mb-2">
  					<dt class="card-subtitle">تاريخ الانشاء:</dt>
  					<dd class="text-muted">{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
  				</dl>

  				<dl class="dl-horizontal mb-2">
  					<dt class="card-subtitle">تاريخ اخر تعديل:</dt>
  					<dd class="text-muted">{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
  				</dl>
        <div class="row">
          <a class="btn btn-primary col m-1" href="{{ route('posts.edit', $post->id) }}">تعديل</a>
          <a class="btn btn-danger col m-1" href="{{ route('posts.destroy', $post->id) }}" onclick="event.preventDefault();
                    document.getElementById('delete-post').submit();">
            حذف
          </a>

          <form id="delete-post" action="{{ route('posts.destroy', $post->id) }}" method="post" style="display: none;">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
