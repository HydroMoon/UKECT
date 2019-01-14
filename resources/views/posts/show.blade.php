@extends('dash')
@section('title')
{{ $post->title }}
@endsection
@section('content')
<div class="row">
  <div class="col-lg-8">

    <h1 class="mt-4">{{ $post->title }}</h1>

    <p class="lead">
      {{ __('courses.postby') }}
      {{ $post->uname }}
    </p>
    <hr>
    <p>
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
    </p>

    <hr>

    <img class="img-fluid rounded" src="{{ asset('images/' . $post->image) }}" alt="">

    <hr>

    <div>
      {!! $post->body !!}
    </div>


  </div>
  <div class="col-md-4">
    <div class="card my-4">
      <h5 class="card-header">{{ $post->title }}</h5>
      <div class="card-body">
        <dl class="dl-horizontal mb-2">
  					<dt class="card-subtitle">{{ __('courses.postlink') }}:</dt>
  					<a href="{{ route('blog.single', $post->slug) }}" class="link">{{ route('blog.single', $post->slug) }}</a>
  				</dl>

        <dl class="dl-horizontal mb-2">
  					<dt class="card-subtitle">{{ __('words.date_start') }}:</dt>
  					<dd class="text-muted">{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
  				</dl>

  				<dl class="dl-horizontal mb-2">
  					<dt class="card-subtitle">{{ __('words.date_edit') }}:</dt>
  					<dd class="text-muted">{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
  				</dl>
        <div class="row">
          <a class="btn btn-primary col m-1" href="{{ route('posts.edit', $post->id) }}">{{ __('words.c_edit') }}</a>
          <a class="btn btn-danger col m-1" href="{{ route('posts.destroy', $post->id) }}" onclick="event.preventDefault();
                    document.getElementById('delete-post').submit();">
            {{ __('courses.del') }}
          </a>

          <form id="delete-post" action="{{ route('posts.destroy', $post->id) }}" method="post" style="display: none;">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
          </form>
        </div>
        <div class="row">
          <a class="btn btn-secondary col m-1" href="{{ route('posts.index') }}">{{ __('courses.postback') }}</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
