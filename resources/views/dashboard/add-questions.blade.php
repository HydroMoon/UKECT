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
    <div class="card-header">{{ __('words.quiz_namm') }} - {{ $questions->title}}</div>
    <div class="card-body" style="overflow-x:auto;">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('words.que_name') }}</th>
                    {{-- <th scope="col">{{ __('words.quiz_no') }}</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($questions->questions as $key=>$item)
                <tr>
                    <td>{{ ($key+1) }}</td>
                    <td>{{ $item->question }}</td>
                    {{-- <td>{{ $item-> }}</td> --}}
                    <td>
                        <div class="row">
                            <div class="col-sm-4 m-1">
                                <a class="btn btn-info" href="{{ route('admin.answer.get', $item->id) }}">{{
                                    __('words.ans_show') }}</a>
                                <a class="btn btn-default" data-toggle="collapse" href="#addAnswer{{ $item->id }}"
                                    aria-expanded="false" aria-controls="addAnswer{{ $item->id }}">{{
                                        __('words.quiz_adda') }}</a>
                            </div>
                            <div class="col-sm-4 m-1">
                                <form action="{{ route('admin.question.delete', $item->id) }}" method="post">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button class="btn btn-danger" type="submit">{{
                                        __('words.que_del') }}</button>
                                </form>
                            </div>
                            <div class="collapse" id="addAnswer{{ $item->id }}">
                                <div class="mt-2">
                                    <form class="form-inline" action="{{ route('admin.answer.add') }}" method="post">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label class="m-2" for="question">{{ __('words.answe') }}</label>
                                            <input type="text" name="question{{ $item->id }}"
                                                id="question{{ $item->id }}" class="form-control">
                                        </div>
                                        <div class="form-group custom-control custom-checkbox mx-2">
                                            <input type="checkbox" name="correct{{ $item->id }}"
                                                class="custom-control-input" id="defaultUnchecked{{ $item->id }}">
                                            <label class="custom-control-label"
                                                for="defaultUnchecked{{ $item->id }}">{{ __('words.iscorrect') }}</label>
                                        </div>
                                        <input type="hidden" name="question_id" value="{{ $item->id }}">
                                        <div class="form-group">
                                            <button class="btn btn-success m-2"
                                                type="submit">{{ __('words.add_ans') }}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
        <div class="row p-3">
            <form class="form-inline" action="{{ route('admin.question.add') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="m-2" for="question">{{ __('words.que_name') }}</label>
                    <input type="text" name="question" id="question" class="form-control">
                </div>
                <input type="hidden" name="quiz_id" value="{{ $questions->id }}">
                <div class="form-group">
                    <button class="btn btn-success m-2" type="submit">{{ __('words.quiz_addq') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection