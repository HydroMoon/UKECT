@extends('app')
@section('title')
التسجيل في الكورسات الطويلة
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 m-4 mx-auto">
            <div class="card card-default">
                <div class="card-header">تسجيل الكورسات الطويلة</div>

                <div class="card-body">
                    <form id="reg-form" class="form-horizontal" method="POST" action="{{ route('users.inside.long.submit') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name">الأسم رباعي</label>


                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                        </div>

                        <div class="form-group date" data-date="2000-02-02" data-date-format="yyyy-mm-dd">
                                <label for="dob">تاريخ الميلاد</label>
    
    
                                    <input id="dob" class="form-control datepicker" name="dob" required>
    
    
                            </div>
                            <div class="form-group">
                                    <label for="inputState">الجنس</label>
                                    <select name="sex" id="inputState" class="form-control">
                                      <option value="ذكر" selected>ذكر</option>
                                      <option value="انثى">انثى</option>
                                    </select>
                                  </div>

                                  <div class="form-group">
                                      <label for="nationality">الجنسية</label>

                                      <input class="form-control" type="text" name="nationality" required>
                                  </div>

                        <div class="form-group">
                            <label for="phone">الهاتف</label>


                                <input id="phone" type="text" class="form-control" name="phone" value="{{ $user->phone }}" required>


                        </div>

                        <div class="form-group">
                                <label for="email">البريد الإلكتروني</label>
    
    
                                    <input id="email" type="text" class="form-control" name="email" value="{{ $user->email }}" required>
    

    
                            </div>


                              <div class="form-group">
                                    <label for="inputState">البرامج المتاحة</label>
                                    <select id="inputState" class="form-control" name="lcourse_id">
                                      <option selected>اختيار البرنامج</option>
                                      @foreach ($longc as $item)
                                          <option value="{{ $item->id }}">{{ $item->ctype }}: {{ $item->cname }}</option>
                                      @endforeach
                                    </select>
                                  </div>

                                  <input type="hidden" name="userid" value="{{ $user->id }}">

                        <div class="form-group">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AppModel">
                                    تسجيل
                                </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="AppModel" tabindex="-1" role="dialog" aria-labelledby="AppModelLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="AppModelLabel">تأكيد</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              هل انت متاكد من التسجيل
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
                <button type="button" class="btn btn-success" onclick="event.preventDefault();
                document.getElementById('reg-form').submit();">نعم</button>
              </div>
          </div>
        </div>
      </div>
@endsection
