@extends('app')

@section('title')
{{ __('words.addsub') }}
@endsection
@section('stylee')
    <!-- Filepond stylesheet -->
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
@endsection
@section('content')
<div class="card card-default mt-3 mb-3">
    <div class="card-header">{{ __('words.course') }} - {{ $quiz->course_name}}</div>
    <div class="card-body" style="overflow-x:auto;">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('words.quiz_name') }}</th>
                    <th scope="col">{{ __('words.quiz_no') }}</th>
                    <th scope="col">{{ __('words.quiz_score') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($quiz->quizzes as $key=>$item)
                <tr>
                    <td>{{ ($key+1) }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->max_number_questions }}</td>
                    <td>{{ $item->min_score }}</td>
                    <td>
                        <div class="row">
                            <div class="col-sm-4 m-1">
                                <a class="btn btn-default" href="{{ route('admin.question.get', $item->id) }}">{{
                                    __('words.quiz_addq') }}</a>
                            </div>
                            <div class="col-sm-4 m-1">
                                <form action="{{ route('admin.quiz.delete', $item->id) }}" method="post">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button class="btn btn-danger" type="submit">{{
                                        __('words.quiz_del') }}</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#ShortModal">
            {{ __('words.quiz_add') }}
        </button>
    </div>
</div>

<div class="modal fade" id="ShortModal" tabindex="-1" role="dialog" aria-labelledby="ShortModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ShortModalLabel">{{ __('words.quiz_add') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add-short-course" action="{{ route('admin.quiz.add') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="title">{{ __('words.quiz_name') }}</label>
                        <input class="form-control" type="text" name="title" id="title">
                    </div>

                    <div class="form-group">
                        <label for="no_ques">{{ __('words.quiz_no') }}</label>
                        <input class="form-control" type="text" name="no_ques" id="no_ques">
                    </div>

                    <div class="form-group">
                        <label for="score">{{ __('words.quiz_score') }}</label>
                        <input class="form-control" type="text" name="score" id="score">
                    </div>

                    <input type="hidden" name="course_id" value="{{ $quiz->id }}">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('words.c_close') }}</button>
                <button type="button" class="btn btn-success" onclick="event.preventDefault();
                        document.getElementById('add-short-course').submit();">{{
                    __('words.c_save') }}</button>
            </div>
        </div>
    </div>
</div>
@endsection