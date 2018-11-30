<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="rtl">
    <head>
      @include('extra._head')
      @include('extra._stylesheets')
    </head>
    <body>
      @include('extra._nav')

      @yield('jum')

      <div class="container">
        @include('extra._message')
        @yield('content')
      </div>

      @yield('sec')


      @include('extra._footer')
      @include('extra._scripts')
    </body>
</html>
