@if (Session::has('success'))
  <div class="alert alert-success mt-4" role="alert">
    <strong>{{ __('words.suc') }}: </strong>{{ Session::get('success') }}
  </div>
@endif

@if (Session::has('error'))
  <div class="alert alert-danger mt-4" role="alert">
    <strong>{{ __('words.fail') }}: </strong>{{ Session::get('error') }}
  </div>
@endif

@if (isset($errors) && count($errors) > 0)
  <div class="alert alert-danger mt-4" role="alert">
    <strong>{{ __('words.error') }}:</strong>
    <ul>
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
    </ul>
  </div>
@endif
