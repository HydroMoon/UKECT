@extends('app')


@section('content')
<div class="card mt-3 mb-3">
        <div class="card-header">الكورسات قصيرة الأمد</div>
        <div class="card-body" style="overflow-x:auto;">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">اسم الكورس</th>
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
    
@endsection