@extends('dash')
@section('title')
  {{ 'لوحة التحكم' }}
@endsection
@section('content')
  <div class="card mt-3 mb-3">
    <div class="card-header">لوحة التحكم الرئيسية</div>
    <div class="card-body">
      <div class="card-title">الكورسات</div>
      <ul>
        <div class="form-control">
          <a class="btn btn-default" href="{{ route('courses.index') }}">الكورسات</a>
          <a class="btn btn-default" href="#">إضافة الكورسات</a>
        </div>
      </ul>
      <div class="card-title">المتدربين</div>
      <ul>
        <div class="form-control">
          <a class="btn btn-default" href="#">بيانات المسجلين</a>
          <a class="btn btn-default" href="#">تأكيد التسجيل</a>
        </div>
      </ul>
      <div class="card-title">المدونة</div>
      <ul>
        <div class="form-control">
          <a class="btn btn-default" href="{{ route('posts.index') }}">المنشورات</a>
          <a class="btn btn-default" href="#">إضافة منشور</a>
        </div>
      </ul>
      <div class="card-title">المستخدمين</div>
      <ul>
        <div class="form-control">
          <a class="btn btn-default" href="#">إضافة مستخدم</a>
          <a class="btn btn-default" href="#">عرض المستخدمين</a>
        </div>
      </ul>

    </div>
  </div>
@endsection
