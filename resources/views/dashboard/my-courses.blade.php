@extends('app')

@section('title')
{{ __('words.addsub') }}
@endsection

@section('content')
<div class="card card-default mt-3 mb-3">
    <div class="card-header">{{ __('words.course') }} - اسم المشرف: {{ auth()->user()->name }}</div>
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
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection