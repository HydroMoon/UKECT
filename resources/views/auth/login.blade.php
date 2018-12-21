@extends('app')
@section('title')
تسجيل الدخول
@endsection
@section('content')
    <div class="row">
        <div class="col-md-5 m-4 mx-auto">
            <div class="card card-default">
                <div class="card-header text-center">تسجيل الدخول</div>

                <div class="card-body">
                    <form id="testt" class="form-horizontal" method="POST" action="{{ route('login') }}" data-parsley-validate>
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">البريد الإلكتروني</label>

                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label">كلمة السر</label>


                                <input id="password" type="password" class="form-control" name="password" required>

                        </div>

                        <div class="form-group">
                            <div class="">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> تذكرني
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-default">
                                    تسجيل الدخول
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    هل نسيت كلمة السر؟
                                </a>

                                <a href="{{ route('admin.login') }}">
                                    <span style="color: #2BBBAD;"><i class="fas fa-2x fa-user-cog"></i></span>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
