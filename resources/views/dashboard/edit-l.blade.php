@extends('dash')
@section('title')
{{ $long->spec_name }}
@endsection
@section('content')
<div class="row">
    <div class="col-lg-8 mt-3">
        <h3 class="text-center">{{ __('words.longc') }}</h3>
        <form id="editpost" action="{{ route('admin.lcourse.update', $long->id) }}" method="POST">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <div class="form-group">
                <label for="cname">{{ __('words.course_lname') }}</label>
                <input class="form-control" type="text" name="spec_name" id="cname" value="{{ $long->spec_name }}">
            </div>
            <div class="form-group">
                <label for="ctype">{{ __('words.course_type') }}</label>
                <input class="form-control" type="text" name="spec_type" id="ctype" value="{{ $long->spec_type }}">
            </div>
            <div class="form-group">
                <label for="certificate">{{ __('words.course_cert') }}</label>
                <input class="form-control" type="text" name="duration" id="certificate" value="{{ $long->duration }}">
            </div>
            <div class="form-group">
                <label for="" info>{{ __('words.cl_info') }}</label>
                <textarea class="form-control" name="info" id="info" cols="30" rows="3">{{ $long->info }}</textarea>
            </div>
        </form>
    </div>
    <div class="col-md-4">
        <div class="card my-4">
            <h5 class="card-header">{{ $long->spec_name }}</h5>
            <div class="card-body">
                <dl class="dl-horizontal mb-2">
                    <dt class="card-subtitle">{{ __('words.date_start') }}:</dt>
                    <dd class="text-muted">{{ date('M j, Y h:ia', strtotime($long->created_at)) }}</dd>
                </dl>
                <dl class="dl-horizontal mb-2">
                    <dt class="card-subtitle">{{ __('words.date_edit') }}:</dt>
                    <dd class="text-muted">{{ date('M j, Y h:ia', strtotime($long->updated_at)) }}</dd>
                </dl>
                <div class="row">
                    <a class="btn btn-success col m-1" href="{{ route('admin.lcourse.update', $long->id) }}" onclick="event.preventDefault();
                    document.getElementById('editpost').submit();">
                        {{ __('words.c_save') }}
                    </a>
                </div>
                {{-- <div class="row">
                    <button type="button" class="btn btn-danger col m-1" data-toggle="modal" data-target="#AppModel">{{
                        __('words.cl_delete') }}</button>
                </div> --}}
            </div>
        </div>
    </div>
</div>
<form id="delete-course" action="{{ route('admin.lcourse.delete', $long->id) }}" method="post" style="display: none;">
    {{ method_field('DELETE') }}
    {{ csrf_field() }}
</form>
<div class="modal fade" id="AppModel" tabindex="-1" role="dialog" aria-labelledby="AppModelLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AppModelLabel">{{ __('words.confrim') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ __('words.confdiag') }} </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('words.c_close') }}</button>
                <button type="button" class="btn btn-success" onclick="event.preventDefault();
                document.getElementById('delete-course').submit();">{{
                    __('words.yes') }}</button>
            </div>
        </div>
    </div>
</div>
@endsection