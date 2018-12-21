@extends('app')
@section('title')
الكورسات قصيرة الامد
@endsection
@section('jum')

<div class="jumbotron jumbotron-fluid peach-gradient">
  <div class="container">
    <h1 class="display-4">مركز يوكيكت للتدريب</h1>
    <p class="lead">تم أنشاء هذا المركز لتقديم برامج تدريبيه متنوعة تسهم في إعداد كوادر بشرية علي مستوي عالي من التدريب
      ، بما يمكنها من أداء مهامها بصورة ممتازة ، مما يكون له أثر كبير في التقدم والتنمية المستدامة بالبلاد.</p>
  </div>
</div>
@endsection

@section('content')

<div class="row">
  <div class="col-sm mb-4">
    <section class="customer-logos slider" dir="ltr">
      @foreach ($short as $item)
      <div class="slide">
          <div class="card card-default slide-card">
            <div class="card-body">
              <h5 class="text-center">{{ $item->cname }}</h5>
              <div>
                <p>{{ $item->teacher }}</p>
                <p>السعر: {{ $item->price }} جنيه</p>
                <hr>
                <p class="text-center">من {{ $item->start }}</p>
                
                <p class="text-center">الى {{ $item->finish }}</p>
              </div>
              <a class="btn btn-secondary btn-block m-1" href="{{ route('user.short') }}">سجل الان</a>
            </div>
          </div>
        </div>
      @endforeach
    </section>
  </div>
</div>



@endsection

@section('sec2')
<section class="" style="background: #f9f9f9; border: 1px solid #e6e6e6;">
  <div class="container">
    <div class="row">
      <div class="col-sm m-2">
        <br>
        <h3>روئية المركز</h3>
        <p>
          <ul>تطوير التدريب بشقيه التقني والإداري وفقاً لمواصفات الجودة الشاملة.</ul>
        </p>
        <h3>رسالة المركز</h3>
        <p>
          <ul>تقديم برامج تدريبية عالية المستوي يكون لها أثر فعال في ترقية المهن المختلفة وتلبية حاجات السوق.</ul>
        </p>
        <h3>أهداف المركز</h3>
        <p>
          <ul>إعداد كادر مؤهل يتميز بمهارات تخصصيه عالية من خلال التدريب المكثف.</ul>
          <ul>تقديم نظم تدريبيه تتميز بالكفاءة وسرعة الانجاز.</ul>
          <ul>دعم سوق العمل بمايتطلبه من كفاءات قادرة ومؤهلة.</ul>
          <ul>متابعة التطورات التقنية والتوجهات العالمية الحديثة وتقديم الأبحاث والمشاريع في ضوء هذه التطورات .</ul>
        </p>
        <h3>البرامج التي يقدمها المركز</h3>
        <p>
          <ul>اللغة الانجليزية</ul>
          <ul>اللغة العربية للناطقين بغيرها</ul>
          <ul>برامج الحاسوب</ul>
          <ul>المحاسبة اللكترونية</ul>
          <ul>التحليل الاحصائي SPSS</ul>
          <ul>مهارات التنمية البشرية</ul>
        </p>
      </div>
    </div>
  </div>
</section>
@endsection