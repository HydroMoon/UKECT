@extends('app')

@section('title')
{{ __('words.subjectname') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-sm">
            <div class="card card-default mt-3 mb-3">
                <div class="card-header">{{ __('words.course') }} - {{ $spec->spec_name }}</div>
                <form class="col-sm-6 mt-3 mx-auto row" action="{{ route('user.coursesP.show') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group col-sm">
                        <label for="semester">{{ __('words.semester') }}</label>
                        <select name="semester" id="semester" class="form-control">
                            <option value="1">{{ __('words.semester') }} - 1</option>
                            <option value="2">{{ __('words.semester') }} - 2</option>
                            <option value="3">{{ __('words.semester') }} - 3</option>
                            <option value="4">{{ __('words.semester') }} - 4</option>
                            <option value="5">{{ __('words.semester') }} - 5</option>
                            <option value="6">{{ __('words.semester') }} - 6</option>
                            <option value="7">{{ __('words.semester') }} - 7</option>
                            <option value="8">{{ __('words.semester') }} - 8</option>
                        </select>
                    </div>
                    <input type="hidden" name="spec_id" value="{{ $spec->id }}">
                    <div class="form-group">
                        <br>
                        <button class="btn btn-success" type="submit">{{ __('words.open') }}</button>
                    </div>
                </form>
                <div class="card-body" style="overflow-x:auto;">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ __('words.course_name') }}</th>
                                <th scope="col">{{ __('words.course_teach') }}</th>
                                <th scope="col">{{ __('words.semester') }}</th>
                                <th scope="col">{{ __('words.longc') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $key=>$course)
                            <tr>
                                <td>{{ ($key+1) }}</td>
                                <td>{{ $course->course_name }}</td>
                                <td>{{ $course->teacher }}</td>
                                <td>{{ $course->semester }}</td>
                                <td>{{ $spec->spec_name }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-sm-4 m-1">
                                            <a class="btn btn-success" href="{{ route('user.materials', $course->id) }}">{{
                                                __('words.subshow') }}</a>
                                        </div>
                                        <div class="col-sm-4 m-1">
                                            <a class="btn btn-secondary" href="{{ route('user.quiz.show', $course->id) }}">{{
                                                __('words.quiz') }}</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection