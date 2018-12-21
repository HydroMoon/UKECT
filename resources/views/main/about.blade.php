@extends('app')
@section('title')
عن المؤسسة
@endsection
@section('content')
<div class="row">
  <div class="col mx-auto m-4">
    <div class="card">
      <div class="card-header text-center">مركز يوكيكت للتدريب - UK. ECT TRAINING Center</div>
      <div class="card-body">
        تم أنشاء هذا المركز لتقديم برامج تدريبيه متنوعة تسهم في إعداد كوادر بشرية علي مستوي عالي من التدريب ، بما
        يمكنها من أداء مهامها بصورة ممتازة ، مما يكون له أثر كبير في التقدم والتنمية المستدامة بالبلاد.
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm mx-auto m-2">
    <div class="card">
      <div class="card-header text-center">عن المؤسسة</div>
      <div class="card-body">
        <h3>روئية المركز</h3>
        <p>
          <ul>تطوير التدريب بشقيه التقني والإداري وفقاً لمواصفات الجودة الشاملة.</ul>
        </p>
        <br>
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
      </div>
    </div>
  </div>
</div>
{{-- <h3 class="text-center m-2">الكادر القائم على المؤسسة</h3> --}}
{{-- <div class="row">

  <div class="col-sm">
    <div class="card" style="min-width:200px; min-height:400px;">
      <div class="card-body">
        <div class="box">
          <div class="img-card">
            <img src="https://www.planwallpaper.com/static/images/cool-wallpaper-5_G6Qe1wU.jpg">
          </div>
          <h2>Prakash Prajapati<br><span>Web Graphic Designer</span></h2>
          <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et.</p>
          <span>
            <ul>
              <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
            </ul>
          </span>
        </div>
      </div>
    </div>

  </div>

  

</div> --}}

@endsection

{{-- @section('stylee')
<style>
  .card .box {
    position: absolute;
    top: 50%;
    left: 0;
    transform: translateY(-50%);
    text-align: center;
    padding: 20px;
    box-sizing: border-box;
    width: 100%;
  }

  .img-card {
    width: 120px;
    height: 120px;
    margin: 0 auto;
    border-radius: 50%;
    overflow: hidden;
  }

  .img-card img {
    width: 100%;
    height: 100%;
  }

  .card .box h2 {
    font-size: 20px;
    color: #262626;
    margin: 20px auto;
  }

  .card .box h2 span {
    font-size: 14px;
    background: #e91e63;
    color: #fff;
    display: inline-block;
    padding: 4px 10px;
    border-radius: 15px;
  }

  .card .box p {
    color: #262626;
  }

  .card .box span {
    display: inline-flex;
  }

  .card .box ul {
    margin: 0;
    padding: 0;
  }

  .card .box ul li {
    list-style: none;
    float: left;
  }

  .card .box ul li a {
    display: block;
    color: #aaa;
    margin: 0 10px;
    font-size: 20px;
    transition: 0.5s;
    text-align: center;
  }

  .card .box ul li:hover a {
    color: #e91e63;
  }
</style>
@endsection --}}