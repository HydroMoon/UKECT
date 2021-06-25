@extends('app')
@section('title')
{{ __('logreg.regtitle') }}
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5 m-4 mx-auto">
            <div class="card card-default">
                <div class="card-header">{{ __('logreg.regtitle') }}</div>

                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="control-label">{{ __('logreg.name') }}</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"
                                required autofocus>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="control-label">{{ __('logreg.phone') }}</label>
                            <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}"
                                required>

                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">{{ __('words.uemail') }}</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                                required>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="inputState" class="control-label">{{ __('courses.gender') }}</label>
                            <select name="gender" id="inputState" class="form-control">
                                <option value="ذكر" selected>{{ __('courses.male') }}</option>
                                <option value="انثى">{{ __('courses.female') }}</option>
                            </select>
                        </div>


                        <div class="form-group date{{ $errors->has('dob') ? ' has-error' : '' }}" data-date="2000-02-02"
                            data-date-format="yyyy-mm-dd">
                            <label for="dob" class="control-label">{{ __('courses.dob') }}</label>
                            <input id="dob" class="form-control datepicker" name="dob" value="{{ old('dob') }}"
                                required>
                        </div>

                        <div class="form-group{{ $errors->has('spec_id') ? ' has-error' : '' }}">
                            <label for="spec_id">{{ __('words.longc') }}</label>
                            <select class="form-control" name="spec_id" id="spec_id">
                                <option>{{ __('words.choose_long') }}</option>
                                @foreach ($specs as $item)
                                <option value="{{ $item->id }}">{{ $item->spec_type . ': ' . $item->spec_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label">{{ __('logreg.pass') }}</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="control-label">{{ __('logreg.passconf') }}</label>
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required>
                        </div>

                        <input type="hidden" name="login" value="1">

                        <div class="form-group">
                            <button type="submit" class="btn btn-default">
                                {{ __('logreg.register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection