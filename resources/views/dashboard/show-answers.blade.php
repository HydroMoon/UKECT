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
    <div class="card-header">{{ __('words.que_name') }} - {{ $answers->question}}</div>
    <div class="card-body" style="overflow-x:auto;">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('words.que_name') }}</th>
                    <th scope="col">{{ __('words.answe') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($answers->options as $key=>$item)
                <tr>
                    <td>{{ ($key+1) }}</td>
                    <td>{{ $item->alternative }}</td>
                    <td style="text-align: center;">
                        @if ($item->correct == 1)
                        <i class="fa fa-check" aria-hidden="true"></i>
                        @else
                        <i class="fa fa-times" aria-hidden="true"></i>
                        @endif
                    </td>
                    <td>
                        <div class="row">
                            <div class="col-sm-4 m-1">
                                <form action="{{ route('admin.answer.delete', $item->id) }}" method="post">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button class="btn btn-danger" type="submit">{{
                                        __('words.ans_del') }}</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
    </div>
</div>

@endsection