<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="rtl">
    <head>
      @include('extra._head')
      @include('extra._stylesheets')
    </head>
    <body class="Site">
      @include('extra._nav')

      @yield('jum')

      <div class="container Site-content">
        @include('extra._message')
        @yield('content')

      </div>


      @include('extra._footer')
      @include('extra._scripts')
    </body>
</html>
