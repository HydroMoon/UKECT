@extends('dash')
@section('title')
لوحة التحكم
@endsection
@section('content')
  <div class="card mt-3 mb-3">
    <div class="card-header">لوحة التحكم الرئيسية</div>
    <div class="card-body">
      <div class="card-title">الكورسات</div>
      <ul>
        <div class="form-control">
          <a class="btn btn-default" href="{{ route('admin.courses') }}">عرض الكورسات</a>
        </div>
      </ul>
      <div class="card-title">المدرسين</div>
      <ul>
        <div class="form-control">
          <a class="btn btn-default" href="{{ route('admin.teacher') }}">عرض المدرسين</a>
        </div>
      </ul>
      <div class="card-title">المسجلين</div>
      <ul>
        <div class="form-control">
          <a class="btn btn-default" href="{{ route('users') }}">عرض المسجلين</a>
          <a class="btn btn-default" href="{{ route('users.add') }}">تسجيل جديد</a>
        </div>
      </ul>
      <div class="card-title">المدونة</div>
      <ul>
        <div class="form-control">
          <a class="btn btn-default" href="{{ route('posts.index') }}">المنشورات</a>
          <a class="btn btn-default" href="{{ route('posts.create') }}">إضافة منشور</a>
        </div>
      </ul>
      <div class="card-title">الصور</div>
      <ul>
        <div class="form-control">
          <a class="btn btn-default" href="{{ route('admin.image') }}">صور الغلاف</a>
          <a class="btn btn-default" href="{{ route('admin.media') }}">صور الوسائط</a>
        </div>
      </ul>
      <div class="card-title">الرسائل</div>
      <ul>
        <div class="form-control">
          <a class="btn btn-default" href="{{ route('admin.message') }}">عرض الرسائل</a>
        </div>
      </ul>
    </div>
  </div>
@endsection
