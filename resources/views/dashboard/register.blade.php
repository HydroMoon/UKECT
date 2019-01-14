@extends('app')
@section('title')
التسجيل
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5 m-4 mx-auto">
            <div class="card card-default">
                <div class="card-header">{{ __('courses.adduser') }}</div>

                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="control-label">{{ __('courses.regname') }}</label>


                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="control-label">{{ __('courses.phone') }}</label>


                                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required>

                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">{{ __('words.uemail') }}</label>

                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                            
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label">{{ __('courses.pass') }}</label>

                            
                                <input id="password" type="password" class="form-control" name="password" required>

                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="control-label">{{ __('courses.passconf') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>

                        <input type="hidden" name="login" value="0">

                        <div class="form-group">
                                <button type="submit" class="btn btn-default">
                                    {{ __('courses.register') }}
                                </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
