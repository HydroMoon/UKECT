@extends('app')

@section('title')
{{ __('words.quiz') }}
@endsection
@section('stylee')
    <!-- Filepond stylesheet -->
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
@endsection
@section('content')
<div class="card card-default mt-3 mb-3">
    <div class="card-header">{{ __('words.course') }} - {{ $quizzes->course_name}}</div>
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
                @foreach ($quizzes->quizzes as $key=>$item)
                <tr>
                    <td>{{ ($key+1) }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->max_number_questions }}</td>
                    <td>{{ $item->min_score }}</td>
                    <td>
                        <div class="row">
                            <div class="col-sm-4 m-1">
                                <a class="btn btn-default" href="{{ route('admin.quizmark.get', $item->id) }}">{{
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

@endsection