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
                    <th scope="col">{{ __('words.level') }}</th>
                    <th scope="col">{{ __('words.major') }}</th>
                    <th scope="col">{{ __('words.uni') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teacher as $key=>$item)
                <tr>
                    <td>{{ ($key+1) }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->level }}</td>
                    <td>{{ $item->major }}</td>
                    <td>{{ $item->university }}</td>
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
                        <input class="form-control" type="text" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="level">{{ __('words.level') }}</label>
                        <input class="form-control" type="text" name="level" id="level">
                    </div>
                    <div class="form-group">
                        <label for="major">{{ __('words.major') }}</label>
                        <input class="form-control" type="text" name="major" id="major">
                    </div>
                    <div class="form-group">
                        <label for="university">{{ __('words.uni') }}</label>
                        <input class="form-control" type="text" name="university" id="university">
                    </div>
                    <div class="form-group">
                        <label for="info">{{ __('words.teach_info') }}</label>
                        <textarea class="form-control" name="info" id="info" cols="30" rows="3"></textarea>
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