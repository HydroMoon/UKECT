@extends('app')
@section('title')
{{ __('words.quiz') }}
@endsection
@section('content')
<div class="card mt-3 mb-3">
    <div class="card-header">{{ __('words.quiz') }}</div>
    <div class="card-body" style="overflow-x:auto;">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('words.') }}</th>
                    <th scope="col">{{ __('words.quiz_score') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($quizzes as $key=>$item)
                <tr>
                    <td>{{ ($key+1) }}</td>
                    <td>{{ $item->alternative }}</td>
                    <td>{{ $item->score }}/{{ $item->quiz->min_score }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection