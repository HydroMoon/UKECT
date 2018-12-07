@extends('app')



@section('content')
<div class="card mt-3 mb-3">
    
    <div class="card-header">بيانات الكورسات طويلة الأمد</div>
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
                @foreach ($data as $key=>$user)
                <tr>
                    <td>{{ $key }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if ($user->accepted == 1)
                        <i class="fa fa-check" aria-hidden="true"></i>
                        @else
                        <i class="fa fa-times"></i>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
