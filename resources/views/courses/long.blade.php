@extends('app')
@section('title')
{{ __('ukest.ukp') }}
@endsection
@section('jum')

<div class="jumbotron jumbotron-fluid purple-gradient text-white" style="margin-bottom: 0 !important;">
    <div class="container">
        <h2>البرامج المتاحة في الكلية</h2>
        <p class="lead">تحتوي الكلية على العديد من البرامج المتاحة للطلاب للاختيار منها.</p>
    </div>
</div>
@endsection

@section('sec2')
<section style="background: #f9f9f9; border: 1px solid #e6e6e6;">
    <br>
    <div class="container">
        <div class="row">
            <div class="col-sm m-2">    
                <h3>برامج الدبلوم</h3>
                <p>
                    <ul>دبلوم الضيافة الجوية</ul>
                    <ul>دبلوم تقانة المعلومات</ul>
                </p>
            </div>
            <div class="col-sm m-2">
                <h3>برامج البكالاريوس</h3>
                <p>
                    <ul>بكالوريوس الجمارك والتجارة الدولية</ul>
                    <ul>بكالوريوس الاقتصاد والعلوم المالية</ul>
                    <ul>بكالوريويس العمليات الجوية</ul>
                    <ul>بكالوريوس العلوم الإدارية (محاسبة وإدارة أعمال)</ul>
                    <ul>بكالوريوس تقانة المعلومات</ul>
                </p>
            </div>
        </div>
        <hr>
        <h3 class="text-center">برامج الدراسات المستمرة</h3>
        <br>
        <div class="row">
            <hr>
            <div class="col-sm m-2">   
                <p>
                    <ul>الجمارك</ul>
                    <ul>تقانة المعلومات</ul>
                    <ul>المحاسبة الإلكترونية</ul>
                </p>
            </div>
            <div class="col-sm m-2">   
                <p>
                    <ul>وكالات السفر والسياحة</ul>
                    <ul>التسويق والمبيعات</ul>
                </p>
            </div>
        </div>
    </div>
</section>
@endsection