@extends('dash')
@section('title')
لوحة التحكم
@endsection
@section('content')
  <div class="card mt-3 mb-3">
    <div class="card-header">{{ __('words.cpan') }}</div>
    <div class="card-body">
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
          <a class="btn btn-default" href="{{ route('users.add') }}">{{ __('words.auser') }}</a>
        </div>
      </ul>
      <div class="card-title">{{ __('words.blog') }}</div>
      <ul>
        <div class="form-group">
          <a class="btn btn-default" href="{{ route('posts.index') }}">{{ __('words.posts') }}</a>
          <a class="btn btn-default" href="{{ route('posts.create') }}">{{ __('words.apost') }}</a>
        </div>
      </ul>
      <div class="card-title">{{ __('words.pics') }}</div>
      <ul>
        <div class="form-group">
          <a class="btn btn-default" href="{{ route('admin.image') }}">{{ __('words.coveri') }}</a>
          <a class="btn btn-default" href="{{ route('admin.media') }}">{{ __('words.mediai') }}</a>
        </div>
      </ul>
      <div class="card-title">{{ __('words.messages') }}</div>
      <ul>
        <div class="form-group">
          <a class="btn btn-default" href="{{ route('admin.message') }}">{{ __('words.vmess') }}</a>
        </div>
      </ul>
    </div>
  </div>
@endsection
