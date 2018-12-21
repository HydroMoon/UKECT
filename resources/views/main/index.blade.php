@extends('app')
@section('title')
الرئيسية
@endsection
@section('jum')
<header>
  <div class="owl-car" dir="ltr">
      @foreach ($imgs as $key=>$item)
      <div>
        <img class="img-fluid" src="{{ asset('gallery/' . $item->image) }}">
      </div>
      @endforeach
  </div>
  {{-- <div id="Slider" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      @foreach ($imgs as $key=>$item)
        @if ($key == 0)
          <li data-target="#Slider" data-slide-to="{{ $key }}" class="active"></li>       
        @else
          <li data-target="#Slider" data-slide-to="{{ $key }}"></li>
        @endif
        @endforeach
    </ol>
    <div class="carousel-inner" role="listbox">
        @foreach ($imgs as $key=>$item)
        @if ($key == 0)
          <img class="carousel-item active img-fluid" src="{{ asset('gallery/' . $item->image) }}">
        @else
          <img class="carousel-item img-fluid" src="{{ asset('gallery/' . $item->image) }}">
        @endif
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#Slider" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#Slider" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div> --}}
</header>
<div class="jumbotron jumbotron-fluid" style="background: #fff9c4;">
  <div class="container">
    <h2>المؤسسة البريطانيه للإستشارات والتدريب</h2>
    <p>المؤسسة العملاقة التي أنشئت للاسهام في مجالي التعليم والتدريب وتتميز بأنها تقدم برامج دولية علي مستوي عالي الجودة وبرامج محلية ودورات محلية تسهم في تدريب الفئات العاملة وغير العاملة</p>
  </div>
</div>
@endsection


@section('content')


@endsection

@section('sec')
    <section>
      <div class="container">
          <div class="row mb-4">
              <a class="col-sm btn btn-outline-warning waves-effect" href="{{ route('short') }}">الكورسات قصيرة الامد</a>
            
              <a class="col-sm btn btn-outline-warning waves-effect" href="{{ route('long') }}">الكورسات طويلة الامد</a>
            
              <a class="col-sm btn btn-outline-warning waves-effect" href="{{ route('user.dash') }}">متابعة التسجيل</a>
            </div>
      </div>
    </section>

    <section style="background: #f9f9f9; border: 1px solid #e6e6e6;">
      <div class="container">
        <div class="row">
            <div class="col-sm m-2">
                <br>
                <h3 class="text-center">الممثل الإقليمي المعتمد لكل من</h3>
                <p class="text-center">
                        كلية ليفربول التقنية
                        <br>
                        جامعة ميتشجان الامريكية
                    </p>
                <hr>
                <p>برنامج الدبلوم التقني الدولي من كلية ليفربول التقنية حيث يعد هذا البرنامج من أهم برامج التاهيل
                    التخصصي الاحترافي فهو يعمل علي إعداد تقنيين متخصصين ومزودين بالمعارف النظرية والتطبيقية ممايجعلهم
                    أكثر طلباً في سوق العمل ، كما أن هذا البرنامج يتيح ايضا فرصة التصعيد للحصول علي شهادة أعلي
                    كالبكالوريوس الدولي علماً بأن فترة دراسة الدبلوم عامان دراسيان متصلات (12 شهراً) يتلقي الطالب فيهما
                    دراسة مكثفة.</p>
            </div>
            
        </div>
      </div>
    </section>
@endsection
