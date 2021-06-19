@extends('app')

@section('title')
{{ __('words.quiz') }}
@endsection

@section('content')
<div class="row">
    <div class="col-sm">
        <div class="card card-default mt-3 mb-3">
            <div class="card-header">{{ __('words.course') }} - {{ $quiz->course_name }}</div>
            <div class="card-body" style="overflow-x:auto;">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ __('words.quiz_name') }}</th>
                            <th scope="col">{{ __('words.quiz_score') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($quiz->quizzes as $key=>$item)
                        <tr>
                            <td>{{ ($key+1) }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->min_score }}</td>

                            <td>
                                @if (!empty($taken[$key]))
                                @if (!$taken[$key]->quiz_id == $item->id)
                                <div class="row">
                                    <div class="col-sm-4 m-1">
                                        <a class="btn btn-success" href="{{ route('user.question.show', $item->id) }}">{{
                                                __('words.open') }}</a>
                                    </div>
                                </div>
                                @else
                                <span class="font-weight-bold">{{ __('words.stud_mark') }}:
                                    {{ $taken[$key]->score }}/{{ $item->min_score }}</span>
                                @endif
                                @else
                                <div class="row">
                                    <div class="col-sm-4 m-1">
                                        <a class="btn btn-success" href="{{ route('user.question.show', $item->id) }}">{{
                                                __('words.open') }}</a>
                                    </div>
                                </div>
                                @endif
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