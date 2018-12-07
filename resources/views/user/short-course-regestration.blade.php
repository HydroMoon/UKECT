@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 m-4 mx-auto">
            <div class="card card-default">
                <div class="card-header">تسجيل الكورسات القصيرة</div>

                <div class="card-body">
                    <form id="reg-form" class="form-horizontal" method="POST" action="{{ route('user.short.submit') }}">
                        {{ csrf_field() }}
                        
                        <input name="user_id" type="hidden" value="{{ Auth::user()->id }}">
                        <input name="course_id" type="hidden" value="1">

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
                                <label for="inputState">الكورسات</label>
                                <select id="inputState" class="form-control">
                                  <option selected>اختيارالكورس</option>
                                  <option>التنمية البشرية</option>
                                  <option>Moneim SD</option>
                                </select>
                              </div>


                        <div class="form-group">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ConfirmModal">
                                    تسجيل
                                </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ConfirmModal" tabindex="-1" role="dialog" aria-labelledby="ConfirmModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="ConfirmModalLabel">تأكيد</h5>
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
