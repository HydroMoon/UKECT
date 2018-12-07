@extends('app')



@section('content')
<div class="card mt-3 mb-3">
    <div class="card-header">بيانات المسجلين</div>
    <div class="card-body" style="overflow-x:auto;">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">اسم الطالب</th>
                    <th scope="col">رقم الهاتف</th>
                    <th scope="col">البريد الإلكتروني</th>
                    <th scope="col">حالة التسجيل</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <div class="row">
                            <div class="col-sm-4 m-1">
                                <a class="btn btn-default" href="{{ route('users.single.short', $user->id) }}">القصيرة</a>
                            </div>
                            <div class="col-sm-4 m-1">
                                <a class="btn btn-default" href="{{ route('users.single.long', $user->id) }}">الطويلة</a>
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
