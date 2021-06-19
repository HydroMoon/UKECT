@extends('app')
@section('title')
{{ __('words.certhead') }}
@endsection

@section('content')
<div class="row">
    <div class="col-sm-8 m-3 mx-auto">
        <div class="card card-default">
            <div class="card-header text-center">{{ $questions->title }} - {{ __('words.quiz_score') }}:
                {{ $questions->min_score }}</div>
            <div class="card-body">
                <div>
                    <form action="{{ route('user.answer.add') }}" method="post">
                        {{ csrf_field() }}
                        @foreach ($questions->questions as $key => $question)
                        <div class="question ml-sm-5 pl-sm-5 pt-2 m-2">
                            <div class="py-2 h5">
                                <b>{{ ($key + 1) }}:- {{ $question->question }}</b>
                            </div>
                            <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 py-3" id="options">
                                @foreach ($question->options as $answer)
                                <label class="options">{{ $answer->alternative }}<input type="radio"
                                        value="{{ $answer->correct }}" name="choice{{ $question->id }}">
                                    <span class="checkmark"></span>
                                </label>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                        <input type="hidden" name="quiz_id" value="{{ $questions->id }}">
                        <div class="form-group text-center">
                            <button class="btn btn-success" type="submit">{{ __('words.c_save') }}</button>
                        </div>
                    </form>

                    {{-- <div class="d-flex align-items-center pt-3">
                        
                        <div id="prev"> <button class="btn btn-primary">Previous</button> </div>
                        <div class="ml-auto mr-sm-5"> <button class="btn btn-success">Next</button> </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('stylee')
<style>
    .question {
        width: 75%
    }

    .options {
        position: relative;
        padding-left: 40px
    }

    #options label {
        display: block;
        margin-bottom: 15px;
        font-size: 14px;
        cursor: pointer
    }

    .options input {
        opacity: 0
    }

    .checkmark {
        position: absolute;
        top: -1px;
        left: 0;
        height: 25px;
        width: 25px;
        background-color: #555;
        border: 1px solid #ddd;
        border-radius: 50%
    }

    .options input:checked~.checkmark:after {
        display: block
    }

    .options .checkmark:after {
        content: "";
        width: 10px;
        height: 10px;
        display: block;
        background: white;
        position: absolute;
        top: 50%;
        left: 50%;
        border-radius: 50%;
        transform: translate(-50%, -50%) scale(0);
        transition: 300ms ease-in-out 0s
    }

    .options input[type="radio"]:checked~.checkmark {
        background: #21bf73;
        transition: 300ms ease-in-out 0s
    }

    .options input[type="radio"]:checked~.checkmark:after {
        transform: translate(-50%, -50%) scale(1)
    }
</style>
@endsection