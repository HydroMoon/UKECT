@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 m-4 mx-auto">
            <div class="card card-default">
                <div class="card-header">تسجيل الكورسات الطويلة</div>

                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="control-label">الأسم رباعي</label>


                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif

                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="control-label">الهاتف</label>


                                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required>

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif

                        </div>

                        <div class="form-group">
                                <label for="inputState">التخصصات</label>
                                <select id="inputState" class="form-control">
                                  <option selected>اختيار التخصص</option>
                                  <option>دبلوم</option>
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
                                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    تسجيل
                                </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">تأكيد</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              هل انت متاكد من التسجيل
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
              <button type="button" class="btn btn-success">نعم</button>
            </div>
          </div>
        </div>
      </div>
@endsection
