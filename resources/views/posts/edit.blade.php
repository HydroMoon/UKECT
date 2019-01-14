@extends('dash')
@section('title')
{{ $post->title }}
@endsection
@section('stylee')
<script src="{!! asset('js/tinymce/tinymce.min.js') !!}"></script>
<script>tinymce.init({
  selector: 'textarea',
  directionality: "rtl",
  plugins: 'link image lists',
  toolbar: "insertfile undo redo | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
  menubar: false
});</script>
@endsection
@section('content')
<div class="row">
  <div class="col-lg-8">
    <form id="editpost" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data" method="POST">
      {{ method_field('PUT') }}
      {{ csrf_field() }}
      <div class="form-group mt-1">
        <label>{{ __('courses.ptitle') }}</label>
        <input type="text" class="form-control" name="title" value="{{ $post->title }}">
      </div>
      <div class="form-group">
        <label>{{ __('courses.link') }}</label>
        <input type="text" class="form-control" name="slug" value="{{ $post->slug }}">
      </div>
      <div class="form-group">
        <label>{{ __('courses.cov_i') }}:</label>
        <input class="form-control" type="file" name="front_image">
      </div>
      <div class="form-group">
        <label>{{ __('courses.text') }}</label>
        <textarea name="body" rows="8" cols="80">{!! $post->body !!}</textarea>
      </div>
    </form>
  </div>

  <div class="col-md-4">
    <div class="card my-4">
      <h5 class="card-header">{{ $post->title }}</h5>
      <div class="card-body">
        <dl class="dl-horizontal mb-2">
          <dt class="card-subtitle">{{ __('words.date_start') }}:</dt>
          <dd class="text-muted">{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
        </dl>

        <dl class="dl-horizontal mb-2">
          <dt class="card-subtitle">{{ __('words.date_edit') }}:</dt>
          <dd class="text-muted">{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
        </dl>
        <div class="row">
          <a class="btn btn-success col m-1" href="{{ route('posts.update', $post->id) }}" onclick="event.preventDefault();
                    document.getElementById('editpost').submit();">
            {{ __('words.c_save') }}
          </a>
        </div>
        <div class="row">
          <a class="btn btn-secondary col m-1" href="{{ route('posts.index') }}">{{ __('courses.postback') }}</a>
        </div>
      </div>
    </div>

  </div>

</div>
@endsection
