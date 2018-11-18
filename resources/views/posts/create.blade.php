@extends('dash')
@section('stylee')
<script src="{!! asset('js/tinymce/tinymce.min.js') !!}"></script>
<script>tinymce.init({
  selector: 'textarea',
  directionality: "rtl",
  plugins: 'link image',
  toolbar: "insertfile undo redo | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
  menubar: false
});</script>
@endsection


@section('content')
<div class="row">
  <div class="col-md-8 col-offset-2" style="float: none;">
    <form action="{{ route('posts.store') }}" method="POST">
      {{ csrf_field() }}
      <div class="form-group">
        <label>العنوان</label>
        <input type="text" class="form-control" name="title" placeholder="اكتب عنوان">
      </div>
      <div class="form-group">
        <label>الرابط</label>
        <input type="text" name="slug" class="form-control" placeholder="اكتب اختصار للرابط">
      </div>
      <div class="form-group">
        <label>النص</label>
        <textarea name="body" rows="8" cols="80"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">اضافة منشور</button>
    </form>


  </div>

</div>
@endsection
