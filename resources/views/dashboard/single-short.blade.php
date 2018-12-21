@extends('app')
@section('title')
تعديل الكورسات القصيرة
@endsection
@section('content')
<div class="card mt-3 mb-3">
    
    <div class="card-header">بيانات الكورسات قصيرة الأمد - <strong>{{ $usern->name }}</strong></div>
    <div class="card-body" style="overflow-x:auto;">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">اسم الكورس</th>
                    <th scope="col">تاريخ التسجيل</th>
                    <th scope="col">مدة الكورس</th>
                    <th scope="col" style="text-align: center;">حالة التسجيل</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reg as $key=>$user)
                <tr>
                    <td>{{ $key }}</td>
                    <td>{{ $user->scourse->cname }}</td>
                    <td>{{ $user->scourse->created_at }}</td>
                    <td>من {{ $user->scourse->start }} الى {{ $user->scourse->finish }}</td>
                    <td style="text-align: center;">
                        @if ($user->accepted == 1)
                        <i class="fa fa-check" aria-hidden="true"></i>
                        @else
                        <i class="fa fa-times"></i>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('users.single.supdate', $user->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <select class="form-control" name="acc">
                                @if ($user->accepted == 1)
                                <option selected value="1">مسجل</option>
                                <option value="0">غير مسجل</option>
                                @else
                                <option value="1">مسجل</option>
                                <option selected value="0">غير مسجل</option>
                                @endif
                            </select>
                            <button class="btn btn-success" type="submit">تاكيد التسجيل</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
