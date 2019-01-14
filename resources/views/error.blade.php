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
    <nav class="navbar navbar-dark peach-gradient py-4">
        <!-- Navbar brand -->
        <a class="navbar-brand text-center" href="{{ route('main') }}">{{ __('home.ukesttit') }}</a>
      </nav>
      
  

  @yield('jum')

  @yield('sec')

  <div class="container-fluid Site-content">
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