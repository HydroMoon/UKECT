@extends('app')
@section('title')
{{ __('logreg.logadmintitle') }}
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5 m-4 mx-auto">
            <div class="card card-default">
                <div class="card-header text-center">{{ __('logreg.logadmintitle') }}</div>

                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('admin.login.submit') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">{{ __('words.uemail') }}</label>

                            
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">{{ __('logreg.pass') }}</label>


                                <input id="password" type="password" class="form-control" name="password" required>

                        </div>

                        <div class="form-group">
                            <div class="">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('logreg.remember') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-default">
                                    {{ __('logreg.login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
