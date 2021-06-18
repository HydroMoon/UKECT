@extends('app')

@section('title')
{{ __('words.subjectname') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-sm">
            <div class="card card-default mt-3 mb-3">
                <div class="card-header">{{ __('words.course') }} - {{ $spec->spec_name }}</div>
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
                                                __('words.open') }}</a>
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