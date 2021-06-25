@extends('app')

@section('title')
{{ __('words.addsub') }}
@endsection

@section('content')
<div class="card card-default mt-3 mb-3">
    <div class="card-header">{{ __('words.course') }} - اسم المشرف: {{ auth()->user()->name }}</div>
    <form class="col-sm-6 mt-3 mx-auto row" action="{{ route('admin.coursesP.get') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group col-sm">
            <label for="spec">{{ __('words.program') }}</label>
            <select name="spec_id" id="spec" class="form-control">
                @foreach ($spec as $item)
                    <option value="{{ $item->id }}">{{ $item->spec_name }}</option>
                @endforeach
            </select>
        </div>
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
                    <th scope="col">{{ __('words.semester') }}</th>
                    <th scope="col">{{ __('words.longc') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $key=>$course)
                <tr>
                    <td>{{ ($key+1) }}</td>
                    <td>{{ $course->course_name }}</td>
                    <td>{{ $course->semester }}</td>
                    <td>{{ $course->spec->spec_name }}</td>
                    <td>
                        <div class="row">
                            <div class="col-sm-4 m-1">
                               <a class="btn btn-default" href="{{ route('admin.lectures.get', $course->id) }}">{{
                                    __('words.addsub') }}</a>
                            </div>
                            <div class="col-sm-4 m-1">
                                <a class="btn btn-secondary" href="{{ route('admin.quiz.get', $course->id) }}">{{
                                    __('words.quiz_add') }}</a>
                            </div>
                            <div class="col-sm-4 m-1">
                                <a class="btn btn-primary" href="{{ route('admin.mark.get', $course->id) }}">{{
                                    __('words.stud_ma') }}</a>
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