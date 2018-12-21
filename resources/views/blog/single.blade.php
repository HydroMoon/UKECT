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
        تم النشر بواسطة
       {{ $post->uname }}
      </p>

    <hr>

    <!-- Date/Time -->
    <p><div class="" style="direction:ltr;">
        ({{ date_format($post->created_at, 'd/m/Y g:i A') }}) تم النشر في
      </div></p>

    <hr>

    <!-- Preview Image -->
    <img class="img-fluid rounded" src="{{ asset('images/' . $post->image) }}" alt=""/>

    <hr>
    {!! $post->body !!}

    <div class="ssk-group text-center" dir="ltr">
        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}" target="_blank" class="ssk ssk-facebook"></a>
    </div>
  </div>

  <div class="col-md-4 mb-4 mt-4">
    <div class="card">
      <h5 class="card-header">الوسائط</h5>
      <div class="card-body">
        @if (empty($imgs))
        سوف تكون جميع الوسائط موجودة هنا
        @else
        <div class="media-main slider" dir="ltr">
            @foreach ($imgs as $item)
            <a href="{{ asset('gallery/' . $item->image) }}" data-toggle="lightbox" data-gallery="example-gallery"
                class="col-sm-4">
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
