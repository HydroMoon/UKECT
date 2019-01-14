<!doctype html>
@if (app()->getLocale() == 'en')
  <html lang="{{ app()->getLocale() }}" dir="ltr">
@else
  <html lang="{{ app()->getLocale() }}" dir="rtl">
@endif

<head>
  @include('extra._head')
  @include('extra._stylesheets')
</head>

<body class="Site">
  @if (app()->getLocale() == 'en')
    @include('extra._nav_en')
  @else
    @include('extra._nav')
  @endif
  

  @yield('jum')

  @yield('sec')

  <div class="container Site-content">
    @include('extra._message')
    @yield('content')
  </div>


  @yield('sec2')


  @if (app()->getLocale() == 'en')
    @include('extra._footer_en')
  @else
    @include('extra._footer')
  @endif

  @include('extra._scripts')
</body>

</html>