@extends('app')
@section('title')
{{ __('words.add_note') }}
@endsection

@section('content')
<div class="row">
    <div class="col-sm">
        <div class="card card-default m-3">
            <div class="card-header">{{ __('words.add_note') }}</div>
            <div class="card-body">
                <div class="form-group">
                    <strong>{{ __('logreg.name') }}: </strong>{{ $user->name }}
                </div>
                <div class="form-group">
                    <strong>{{ __('words.uphone') }}: </strong>{{ $user->phone }}
                </div>
                <div class="form-group">
                    <strong>{{ __('words.course_lname') }}: </strong>{{ $lcourse->cname }}
                </div>
                <div class="form-group">
                        <strong>{{ __('words.course_type') }}: </strong>{{ $lcourse->ctype }}
                    </div>
                <div class="form-group">
                    <strong>{{ __('words.regdate') }}: </strong>{{ date('Y-m-j', strtotime($lcourse->regs->created_at)) }}
                </div>
                <hr>
                <form action="{{ route('admin.note.store') }}" method="POST">
                    {{ csrf_field() }}
                    <label for="note">{{ __('words.not') }}</label>
                    <div class="form-group">
                        <textarea class="form-control" name="note" id="note" cols="30" rows="10"></textarea>
                    </div>
                    <input type="hidden" name="uid" value="{{ $user->id }}">
                    <input type="hidden" name="cid" value="{{ $lcourse->id }}">
                    <div class="form-group">
                        <button class="btn btn-secondary" type="submit">{{ __('words.c_save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection