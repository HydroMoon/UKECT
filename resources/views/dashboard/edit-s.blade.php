@extends('dash')
@section('title')
{{ $short->cname }}
@endsection
@section('content')
<div class="row">
  <div class="col-lg-8 mt-3">
        <h3 class="text-center">{{ __('words.shortc') }}</h3>
    <form id="editpost" action="{{ route('admin.scourse.update', $short->id) }}" method="POST">
      {{ method_field('PUT') }}
      {{ csrf_field() }}
      <div class="form-group">
            <label for="cname">{{ __('words.course_name') }}</label>
            <input class="form-control" type="text" name="cname" id="cname" value="{{ $short->cname }}">
        </div>
        <div class="form-group">
            <label for="price">{{ __('words.course_price') }}</label>
            <input class="form-control" type="text" name="price" id="price" value="{{ $short->price }}">
        </div>
        <div class="form-group">
            <label for="teacher">{{ __('words.course_teach') }}</label>
            <select class="form-control" name="teacher" id="teacher">
                @foreach ($teacher as $item)
                @if ("{{ $short->teacher }}" == "{{ $item->name }}")
                <option selected value="{{ $item->name }}">{{ $item->name }}</option>
                @else
                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="certificate">{{ __('words.course_cert') }}</label>
            <input class="form-control" type="text" name="certificate" id="certificate" value="{{ $short->certificate }}">
        </div>

        <div class="form-group date" data-date="2000-02-02" data-date-format="yyyy-mm-dd">
            <label for="duration">{{ __('words.course_dura') }}</label>

            <div class="row">
                    <div class="col-sm">
                        <label for="dration">{{ __('words.from') }}</label>
                        <input id="duration" class="form-control datepicker" name="start" value="{{ $short->start }}">
                    </div>
                    <div class="col-sm">
                            <label for="dration">{{ __('words.to') }}</label>
                        <input id="duration" class="form-control datepicker" name="finish" value="{{ $short->finish }}">
                    </div>
                </div>
        </div>
        <div class="form-group">
            <label for="info">{{ __('words.c_info') }}</label>
            <textarea class="form-control" name="info" id="info" cols="30" rows="3">{{ $short->info }}</textarea>
        </div>
    </form>
  </div>

  <div class="col-md-4">
    <div class="card my-4">
      <h5 class="card-header">{{ $short->cname }}</h5>
      <div class="card-body">
        <dl class="dl-horizontal mb-2">
          <dt class="card-subtitle">{{ __('words.date_start') }}:</dt>
          <dd class="text-muted">{{ date('M j, Y h:ia', strtotime($short->created_at)) }}</dd>
        </dl>

        <dl class="dl-horizontal mb-2">
          <dt class="card-subtitle">{{ __('words.date_edit') }}:</dt>
          <dd class="text-muted">{{ date('M j, Y h:ia', strtotime($short->updated_at)) }}</dd>
        </dl>
        <div class="row">
          <a class="btn btn-success col m-1" href="{{ route('admin.scourse.update', $short->id) }}" onclick="event.preventDefault();
                    document.getElementById('editpost').submit();">
            {{ __('words.c_save') }}
          </a>
        </div>
        <div class="row">
          <button type="button" class="btn btn-danger col m-1" data-toggle="modal" data-target="#AppModel">{{ __('words.c_delete') }}</button>
        </div>
      </div>
    </div>

  </div>

</div>
<form id="delete-course" action="{{ route('admin.scourse.delete', $short->id) }}" method="post" style="display: none;">
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
              {{ __('words.confdiag') }}
          </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('words.c_close') }}</button>
                <button type="button" class="btn btn-success" onclick="event.preventDefault();
                document.getElementById('delete-course').submit();">{{ __('words.yes') }}</button>
              </div>
          </div>
        </div>
      </div>
@endsection
