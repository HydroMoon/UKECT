@extends('app')
@section('title')
المدرسين
@endsection
@section('content')
<div class="card mt-3 mb-3">
    <div class="card-header">{{ __('words.teach') }}</div>
    <div class="card-body" style="overflow-x:auto;">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('words.course_teach') }}</th>
                    <th scope="col">{{ __('logreg.phone') }}</th>
                    <th scope="col">{{ __('words.uemail') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teacher as $key=>$item)
                <tr>
                    <td>{{ ($key+1) }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->email }}</td>
                    <td>
                        <form action="{{ route('admin.teacher.delete', $item->id) }}" method="POST">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button class="btn btn-danger" type="submit">{{ __('words.del') }}</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#TeacherModal">
            {{ __('words.addteach') }}
        </button>
    </div>
</div>

<div class="modal fade" id="TeacherModal" tabindex="-1" role="dialog" aria-labelledby="TeacherModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TeacherModalLabel">{{ __('words.addteach') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add-teacher" action="{{ route('admin.teacher.add') }}" method="post">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="name">{{ __('words.course_teach') }}</label>
                        <input class="form-control" type="text" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">{{ __('logreg.phone') }}</label>
                        <input class="form-control" type="text" name="phone" id="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="email">{{ __('words.uemail') }}</label>
                        <input class="form-control" type="email" name="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">{{ __('logreg.pass') }}</label>
                        <input class="form-control" type="password" name="password" id="password" required>
                    </div>
                    <div class="form-group">
                        <label for="password-confirmation">{{ __('logreg.passconf') }}</label>
                        <input class="form-control" type="password" name="password_confirmation" id="password-confirmation" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('words.c_close') }}</button>
                <button type="button" class="btn btn-success" onclick="event.preventDefault();
            document.getElementById('add-teacher').submit();">{{ __('words.addteach') }}</button>
            </div>
        </div>
    </div>
</div>
@endsection