@extends('app')
@section('title')
المدرسين
@endsection
@section('content')
<div class="card mt-3 mb-3">

    <div class="card-header">الاساتذة</div>
    <div class="card-body" style="overflow-x:auto;">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">اسم الاستاذ</th>
                    <th scope="col">الدرجة العلمية</th>
                    <th scope="col">التخصص</th>
                    <th scope="col">الجامعة</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teacher as $key=>$user)
                <tr>
                    <td>{{ $key }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->level }}</td>
                    <td>{{ $user->major }}</td>
                    <td>{{ $user->university }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#TeacherModal">
            إضافة استاذ/ة
        </button>
    </div>
</div>



<div class="modal fade" id="TeacherModal" tabindex="-1" role="dialog" aria-labelledby="TeacherModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TeacherModalLabel">إضافة الاساتذة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add-teacher" action="{{ route('admin.teacher.add') }}" method="post">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="name">اسم الاستاذ/ة</label>
                        <input class="form-control" type="text" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="level">الدرجة العلمية</label>
                        <input class="form-control" type="text" name="level" id="level">
                    </div>
                    <div class="form-group">
                        <label for="major">التخصص</label>
                        <input class="form-control" type="text" name="major" id="major">
                    </div>
                    <div class="form-group">
                        <label for="university">الجامعة</label>
                        <input class="form-control" type="text" name="university" id="university">
                    </div>
                    <div class="form-group">
                        <label for="info">معلومات عن الاستاذ</label>
                        <textarea class="form-control" name="info" id="info" cols="30" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
                <button type="button" class="btn btn-success" onclick="event.preventDefault();
            document.getElementById('add-teacher').submit();">إضافة الاستاذ/ة</button>
            </div>
        </div>
    </div>
</div>
@endsection