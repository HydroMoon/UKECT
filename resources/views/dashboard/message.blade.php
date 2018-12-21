@extends('app')
@section('title')
الرسائل
@endsection
@section('content')
<div class="card card-default mt-3 mb-3">
    <div class="card-header">الرسائل</div>
    <div class="card-body" style="overflow-x:auto;">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">الاسم</th>
                    <th scope="col">البريدالإلكتروني</th>
                    <th scope="col">الرسالة</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mess as $key=>$message)
                <tr>
                    <td>{{ $key }}</td>
                    <td>{{ $message->name }}</td>
                    <td>{{ $message->email }}</td>
                    <td>{{ $message->message }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection