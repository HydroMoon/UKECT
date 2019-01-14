@extends('app')
@section('title')
{{ __('words.blog') }}
@endsection
@section('jum')

<div class="jumbotron jumbotron-fluid peach-gradient">
  <div class="container">
    <h1 class="display-4">{{ __('courses.blogwel') }}</h1>
    <p class="lead">{{ __('courses.blogsub') }}</p>
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
        <p class="card-text">{{ mb_substr(strip_tags($post->body, '<br>'), 0, 300) }}{{ strlen(strip_tags($post->body))
          > 300 ? "..." : "" }}</p>
        <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">{{ __('courses.readmore') }}</a>
      </div>
      <div class="card-footer text-muted">
        @if (app()->getLocale() == 'en')
        <div class="" style="direction:ltr;">
          {{ __('courses.postdate') }}
          ({{ date_format($post->created_at, 'd/m/Y g:i A') }})
        </div>
        @else
        <div class="" style="direction:ltr;">
          ({{ date_format($post->created_at, 'd/m/Y g:i A') }}) {{ __('courses.postdate') }}
        </div>
        @endif
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
      <h5 class="card-header">{{ __('courses.media') }}</h5>
      <div class="card-body">
        @if (empty($imgs))
        سوف تكون جميع الوسائط موجودة هنا
        @else
        <div class="media-main slider" dir="ltr">
          @foreach ($imgs as $item)
          <a href="{{ asset('gallery/' . $item->image) }}" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
            <div class="thumbnail m-2 slide">
              <img src="{{ asset('gallery/' . $item->image) }}" class="img-fluid img-thumbnail">
            </div>
          </a>
          @endforeach
        </div>
        @endif
      </div>
    </div>
  </div>

</div>
@endsection