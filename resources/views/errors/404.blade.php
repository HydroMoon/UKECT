@extends('error')
@section('title')
Not found
@endsection
@section('stylee')
<style>
    .navbar-brand {
        position: absolute;
        width: 100%;
        left: 0;
        text-align: center;

        vertical-align: middle;
    }

    .navbar-toggle {
        z-index: 3;
    }

    .row.center {
        display: flex;
        align-items: center;

    }

    .img {
        opacity: 0.5;
        filter: alpha(opacity=50);
        /* For IE8 and earlier */
    }
</style>
@endsection
@section('content')
<div class="row m-3 center">
    <div class="col-sm text-center">
        <img class="img-fluid img" style="max-width: auto; max-height: 80vh;" src="{{ asset('error.png') }}" alt="">
    </div>
    <div class="col-sm text-center">
        <h1 class="" style="font-size:12vw; color: grey;">404</h1>
        <br>
        <p style="color: grey;">لم يتم العثور على الصفحة المطلوبة <a href="/">اضغط هنا</a> للرجوع للصفحة الرئيسية.</p>
    </div>
</div>
@endsection