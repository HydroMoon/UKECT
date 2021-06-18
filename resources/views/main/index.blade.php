@extends('app')
@section('title')
{{ __('home.home') }}
@endsection
@section('jum')
<div class="jumbotron jumbotron-fluid text-white text-center purple-gradient">
  <div class="container">
    <h2>كلية امدرمان للطيران والتكنولوجيا</h2>
    <p>تأسست كلية أمدرمان للطيران والتكنولوجيا في عام 2019 بقرار وزاري بالرقم (212) وهي إحدى مؤسسات وزارة التعليم العالي والبحث العلمي.</p>
  </div>
</div>
@endsection


@section('content')


@endsection

@section('sec')
    <section>
      <div class="container">
          <div class="row mb-4">
              <a class="col-sm btn btn-outline-secondary waves-effect" href="{{ route('long') }}">البرامج التخصصية</a>
            
              <a class="col-sm btn btn-outline-secondary waves-effect" href="{{ route('user.dash') }}">دخول الطلاب</a>
            
              <a class="col-sm btn btn-outline-secondary waves-effect" href="{{ route('dash') }}">دخول الاساتذة</a>
            </div>
      </div>
    </section>

    <section style="background: #f9f9f9; border: 1px solid #e6e6e6;">
      <div class="container">
        <div class="row">
            <div class="col-sm m-2">
                <br>
                <h3 class="text-center">كلمة رئيس مجلس الأمناء</h3>
                <hr>
                <p class="text-center lead"><i class="fa fa-quote-right mx-3 text-success"></i>
                  يطيب لي مخاطبتكم في هذا اليوم بمناسبة استقبال طلابنا الجدد الذين انضموا لنا هذا العام وهم بلا شك دماءً جديدة تم ضخها في أوصال هذه الكلية الفتية لمواصلة الركب مع أخوة ً لهم سابقين سطروا تفوقهم وتميزهم بحروف من ذهب.
                  <br>
                  انبعثت الفكرة من شركة العسال التي تعمل في مجال التعليم والتدريب وبناء القدرات.</p>
            </div>
            
        </div>
      </div>
    </section>
@endsection
