@extends('app')
@section('title')
صفحة الطالب
@endsection
@section('content')
<div class="row">
    <div class="col-sm m-3">
        <div class="card card-default">
            <div class="card-header">لوحة التسجيل</div>
            <div class="card-body">
                <ul>التسجيل في الكورسات</ul>
                <div class="row">
                    <div class="col-sm m-1">
                        <a class="btn btn-default btn-block" href="{{ route('user.short') }}">قصيرة الامد</a>
                    </div>
                    <div class="col-sm m-1">
                        <a class="btn btn-default btn-block" href="{{ route('user.long') }}">طويلة الامد</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection