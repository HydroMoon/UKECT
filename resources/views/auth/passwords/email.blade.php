@extends('app')
@section('title')
اعادة كلمة السر
@endsection
@section('content')
    <div class="row">
        <div class="col-md-5 m-4 mx-auto">
            <div class="card card-default">
                <div class="card-header text-center">إعادة كلمة السر</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">البريد الإلكتروني</label>

                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                        </div>

                        <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    ارسل رابط إعادة كلمة السر
                                </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
