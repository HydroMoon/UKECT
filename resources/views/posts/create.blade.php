@extends('dash')
@section('title')
{{ __('courses.addpost') }}
@endsection
@section('stylee')
<script src="{!! asset('js/tinymce/tinymce.min.js') !!}"></script>
<script>tinymce.init({
  selector: 'textarea',
  directionality: "rtl",
  plugins: 'link image',
  toolbar: "insertfile undo redo | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
  menubar: false
});</script>
<style>
  .OverflowData p {
  text-overflow:ellipsis;
  overflow: hidden;
  white-space: nowrap;
}
</style>
@endsection


@section('content')
<div class="row">
  <div class="col-md-8 mt-4 col-offset-2" style="float: none;">
    <h1 class="mb-3">{{ __('courses.addpost') }}</h1>
    <form action="{{ route('posts.store') }}" enctype="multipart/form-data" method="POST">
      {{ csrf_field() }}
      <div class="form-group">
        <label>{{ __('courses.ptitle') }}</label>
        <input type="text" class="form-control" name="title" placeholder="{{ __('courses.linkph') }}">
      </div>
      <div class="form-group">
        <label>{{ __('courses.link') }}</label>
        <input type="text" name="slug" class="form-control" placeholder="{{ __('courses.titleph') }}">
      </div>
      <div class="form-group">
        <label>{{ __('courses.cov_i') }}:</label>
        <input type="file" name="front_image" class="form-control">
      </div>
      <div class="form-group">
        <label>{{ __('courses.text') }}</label>
        <textarea wrap="hard" name="body" rows="8" cols="80"></textarea>
      </div>
      <input name="uname" type="hidden" value="{{ Auth::user()->name }}">
      <div class="form-group">
        <button type="submit" class="btn btn-primary">{{ __('courses.savep') }}</button>
      </div>
    </form>
  </div>
</div>
@endsection