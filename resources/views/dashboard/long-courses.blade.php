@extends('app')


@section('content')
<div class="card mt-3 mb-3">
        <div class="card-header">الكورسات طويلة الأمد</div>
        <div class="card-body" style="overflow-x:auto;">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">اسم الكورس</th>
                        <th scope="col">نوع الكورس</th>
                        <th scope="col">سعر الكورس</th>
                        <th scope="col">مدرس الكورس</th>
                        <th scope="col">الشهادة</th>
                        <th scope="col">مدة الكورس</th>
                        <th scope="col">معلومات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key=>$course)
                    <tr>
                        <td>{{ $key }}</td>
                        <td>{{ $course->cname }}</td>
                        <td>{{ $course->ctype }}</td>
                        <td>{{ $course->price }}</td>
                        <td>{{ $course->teacher }}</td>
                        <td>{{ $course->certificate }}</td>
                        <td>{{ $course->duration }}</td>
                        <td>{{ $course->info }}</td>
                        <td>
                            <div class="row">
                                <div class="col-sm-4 m-1">
                                    <a class="btn btn-default" href="#">تعديل</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
                    <form action="{{ route('admin.long.add') }}" method="post">
                        {{ csrf_field() }}
                        
                        <div class="form-group">

                        </div>
                    </form>
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