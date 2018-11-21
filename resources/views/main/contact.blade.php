@extends('app')

@section('content')
<div class="row">
  <div class="col-lg-8 my-4">
    <div class="card">
      <div class="card-header">لمراسلتنا</div>
      <div class="card-body">
        <form class="" action="index.html" method="post">
          <div class="form-group">
            <label>الأسم كامل</label>
            <input class="form-control" type="text" name="" placeholder="ادخل اسمك">
          </div>
          <div class="form-group">
            <label>البريد الإلكتروني</label>
            <input class="form-control" type="email" name="" placeholder="ادخل بريدك">
          </div>
          <div class="form-group">
            <label>الرسالة</label>
            <textarea class="form-control" name="name" rows="8" cols="80"></textarea>
          </div>
          <div class="form-group">
            <button class="btn btn-primary" type="submit" name="button">إرسال</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card my-4">
      <div class="card-header">للتواصل معنا</div>
      <div class="card-body">
        <dl class="dl-horizontal mb-2">
          <dt class="card-subtitle">هواتفنا:</dt>
          <dd class="text-muted" style="direction:ltr;">(+249 964 246 066)</dd>
          <dd class="text-muted" style="direction:ltr;">(+249 999 959 606)</dd>
          <dd class="text-muted" style="direction:ltr;">(+249 128 599 000)</dd>
        </dl>
        <dl class="dl-horizontal mb-2">
          <dt class="card-subtitle">موقعنا:</dt>
          <dd class="text-muted">الخرطوم - حي الصفا مربع 1 - غرب مجمع ودالجبل بامتداد ناصر</dd>
        </dl>
      </div>
    </div>
  </div>

</div>
@endsection
