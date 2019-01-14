@extends('app')
@section('title')
{{ __('courses.title') }}
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 m-4 mx-auto">
            <div class="card card-default">
                <div class="card-header">{{ __('courses.title') }}</div>

                <div class="card-body">
                    <form id="reg-form" class="form-horizontal" method="POST" action="{{ route('user.short.submit') }}">
                        {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="control-label">{{ __('courses.name') }}</label>


                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"
                                required autofocus>

                        </div>
                        <div class="form-group date" data-date="2000-02-02" data-date-format="yyyy-mm-dd">
                            <label for="dob" class="control-label">{{ __('courses.dob') }}</label>

                            <input id="dob" class="form-control datepicker" name="dob" required>
                        </div>
                        <div class="form-group">
                            <label for="inputState" class="control-label">{{ __('courses.gender') }}</label>
                            <select name="sex" id="inputState" class="form-control">
                                <option value="ذكر" selected>{{ __('courses.male') }}</option>
                                <option value="انثى">{{ __('courses.female') }}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="nationality" class="control-label">{{ __('courses.nation') }}</label>

                            <input class="form-control" type="text" name="nationality">
                        </div>

                        <div class="form-group">
                            <label for="phone" class="control-label">{{ __('courses.phone') }}</label>


                            <input id="phone" type="text" class="form-control" name="phone" value="{{ $user->phone }}" required>
                        </div>

                        <div class="form-group">
                            <label for="email" class="control-label">{{ __('words.uemail') }}</label>


                            <input id="email" type="text" class="form-control" name="email" value="{{ $user->email }}" required>
                        </div>

                        <div class="form-group">
                            <label for="inputState" class="control-label">{{ __('courses.courses') }}</label>
                            <select name="scourse_id" id="inputState" class="form-control">
                                <option selected>{{ __('courses.chose') }}</option>
                                @foreach ($shortc as $item)
                                <option value="{{ $item->id }}">{{ $item->cname }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ConfirmModal">
                                    {{ __('courses.register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ConfirmModal" tabindex="-1" role="dialog" aria-labelledby="ConfirmModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ConfirmModalLabel">{{ __('words.confrim') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    {{ __('courses.confdiag') }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('words.c_close') }}</button>
                <button type="button" class="btn btn-success" onclick="event.preventDefault();
              document.getElementById('reg-form').submit();">{{ __('words.yes') }}</button>
            </div>
        </div>
    </div>
</div>
@endsection