@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 m-4 mx-auto">
            <div class="card card-default">
                <div class="card-header">تسجيل الكورسات الطويلة</div>

                <div class="card-body">
                    <form id="reg-form" class="form-horizontal" method="POST" action="{{ route('user.long.submit') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name">الأسم رباعي</label>


                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif

                        </div>

                        <div class="form-group date" data-date="02-02-2000" data-date-format="dd-mm-yyyy">
                                <label for="dob">تاريخ الميلاد</label>
    
    
                                    <input id="dob" class="form-control datepicker" name="dob" value="02-02-2000" required>
    
                                    @if ($errors->has('dob'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                    @endif
    
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

                                      <input class="form-control" type="text" name="nationality">
                                  </div>

                        <div class="form-group">
                            <label for="phone">الهاتف</label>


                                <input id="phone" type="text" class="form-control" name="phone" value="{{ $user->phone }}" required>

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif

                        </div>

                        <div class="form-group">
                                <label for="email">البريد الإلكتروني</label>
    
    
                                    <input id="email" type="text" class="form-control" name="email" value="{{ $user->email }}" required>
    
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
    
                            </div>

                        <div class="form-group">
                                <label for="inputState">التخصصات</label>
                                <select id="inputState" class="form-control" name="scourse_id">
                                  <option selected>اختيار التخصص</option>
                                  <option value="1">دبلوم</option>
                                  <option>بكلاريوس</option>
                                  <option>ماجستير</option>
                                  <option>دكتوراة</option>
                                </select>
                              </div>

                              <div class="form-group">
                                    <label for="inputState">البرامج المتاحة</label>
                                    <select id="inputState" class="form-control">
                                      <option selected>اختيار البرنامج</option>
                                      <option>علوم حاسوب</option>
                                      <option>هندسةاتصالات</option>
                                      <option>هندسة شبكات</option>
                                      <option>إدارة أعمال</option>
                                    </select>
                                  </div>


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
