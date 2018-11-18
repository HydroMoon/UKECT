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
        <li class="nav-item">طويلة المدى</li>
        <li class="nav-item">قصيرة المدى</li>
      </ul>
      <div class="card-title">المتدربين</div>
      <ul>
        <li class="nav-item">بيانات المتدربين</li>
        <li class="nav-item">تاكيد التسجيل</li>
      </ul>
      <div class="card-title">المدونة</div>
      <ul>
        <li class="nav-item"><a class="nav-link" href="{{ route('posts.index') }}">المنشورات</a></li>
        <li class="nav-item">اضافة المنشورات</li>
      </ul>
      <div class="card-title">المستخدمين</div>
      <ul>
        <li class="nav-item">اضافة مستخدم</li>
        <li class="nav-item">حذف مستخدم</li>
      </ul>

    </div>
  </div>
@endsection
