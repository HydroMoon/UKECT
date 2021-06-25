@extends('dash')
@section('title')
لوحة التحكم
@endsection
@section('content')
  <div class="card mt-3 mb-3">
    <div class="card-header">{{ __('words.cpan') }}</div>
    <div class="card-body">
      @role('admin')
      <div class="card-title">{{ __('words.cour') }}</div>
      <ul>
        <div class="form-group">
          <a class="btn btn-default" href="{{ route('admin.courses') }}">{{ __('words.vcour') }}</a>
        </div>
      </ul>
      <div class="card-title">{{ __('words.teach') }}</div>
      <ul>
        <div class="form-group">
          <a class="btn btn-default" href="{{ route('admin.teacher') }}">{{ __('words.vteach') }}</a>
        </div>
      </ul>
      <div class="card-title">{{ __('words.users') }}</div>
      <ul>
        <div class="form-group">
          <a class="btn btn-default" href="{{ route('users') }}">{{ __('words.vuser') }}</a>
          {{-- <a class="btn btn-default" href="{{ route('users.add') }}">{{ __('words.auser') }}</a> --}}
        </div>
      </ul>
      {{-- <div class="card-title">{{ __('words.blog') }}</div>
      <ul>
        <div class="form-group">
          <a class="btn btn-default" href="{{ route('posts.index') }}">{{ __('words.posts') }}</a>
          <a class="btn btn-default" href="{{ route('posts.create') }}">{{ __('words.apost') }}</a>
        </div>
      </ul> --}}
      <div class="card-title">{{ __('words.messages') }}</div>
      <ul>
        <div class="form-group">
          <a class="btn btn-default" href="{{ route('admin.message') }}">{{ __('words.vmess') }}</a>
        </div>
      </ul>
      @endrole
      @role('teacher')
      <div class="card-title">{{ __('words.users') }}</div>
      <ul>
        <div class="form-group">
          <a class="btn btn-default" href="{{ route('admin.courses.get') }}">{{ __('words.cour') }}</a>
        </div>
      </ul>
      <div class="card-title">{{ __('words.teach_name') }}</div>
      <ul>
        <div class="form-group">
          <form class="col-sm-6" action="{{ route('admin.teacher.name') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group col-sm-8">
              <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
              <button class="btn btn-success" type="submit">{{ __('words.c_save') }}</button>
            </div>
          </form>
        </div>
      </ul>
      @endrole
    </div>
  </div>
@endsection
