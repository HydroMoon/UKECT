<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="rtl">
    <head>
      @include('extra._head')
      @include('extra._stylesheets')
    </head>
    <body class="Site">
      @include('extra._nav')

      @yield('jum')

      @yield('sec')
      
      <div class="container Site-content">
        @include('extra._message')
        @yield('content')
      </div>


      @yield('sec2')
     

      @include('extra._footer')
      @include('extra._scripts')
    </body>
</html>
