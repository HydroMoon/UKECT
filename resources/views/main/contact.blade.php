@extends('app')
@section('title')
{{ __('contact.callus') }}
@endsection
@section('content')
<div class="row">
  <div class="col-lg-8 my-3">
    <div class="card">
      <div class="card-header">{{ __('contact.contactus') }}</div>
      <div class="card-body">
        <form class="" action="{{ route('contact.save') }}" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <label>{{ __('contact.fullname') }}</label>
            <input class="form-control" type="text" name="name" placeholder="{{ __('contact.addn') }}">
          </div>
          <div class="form-group">
            <label>{{ __('words.uemail') }}</label>
            <input class="form-control" type="email" name="email" placeholder="{{ __('contact.adde') }}">
          </div>
          <div class="form-group">
            <label>{{ __('contact.message') }}</label>
            <textarea class="form-control" name="message" rows="8" cols="80"></textarea>
          </div>
          <div class="form-group">
            <button class="btn btn-primary" type="submit" name="button">{{ __('contact.send') }}</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card my-3">
      <div class="card-header">{{ __('contact.callus') }}</div>
      <div class="card-body">
        <dl class="dl-horizontal mb-2">
          <dt class="card-subtitle">{{ __('contact.phones') }}:</dt>
          <dd class="text-muted" style="direction:ltr;">(+249 964 246 066)</dd>
          <dd class="text-muted" style="direction:ltr;">(+249 999 959 606)</dd>
          <dd class="text-muted" style="direction:ltr;">(+249 128 599 000)</dd>
        </dl>
        <dl class="dl-horizontal mb-2">
          <dt class="card-subtitle">{{ __('contact.ouremail') }}:</dt>
          <dd class="text-muted">support@uk-ect.com</dd>
          <dd class="text-muted">uk.ect.academic1@gmail.com</dd>
        </dl>
        <dl class="dl-horizontal mb-2">
          <dt class="card-subtitle">{{ __('contact.address') }}:</dt>
          <dd class="text-muted">{{ __('contact.loc') }}</dd>
        </dl>
      </div>
    </div>
  </div>

</div>
@endsection
