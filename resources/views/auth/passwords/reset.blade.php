@extends('app')
@section('title')
اعادة كلمة السر
@endsection
@section('content')
<div class="row">
    <div class="col-md-5 m-4 mx-auto">
        <div class="card card-default">
            <div class="card-header text-center">كلمة السر الجديدة</div>

            <div class="card-body">
                <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                    {{ csrf_field() }}

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">البريد الإلكتروني</label>

                        <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}"
                            required autofocus>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password">كلمة السر</label>

                        <input id="password" type="password" class="form-control" name="password" required>
                    </div>

                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label for="password-confirm">تأكيد كلمة السر</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required>

                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            تغيير كلمة السر
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection