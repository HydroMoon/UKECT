<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark peach-gradient">

  <!-- Navbar brand -->
  <a class="navbar-brand" href="{{ route('main') }}">المؤسسة البريطانية</a>

  <!-- Collapse button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Collapsible content -->
  <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <!-- Links -->
    <ul class="navbar-nav mr-auto">
      <li class="nav-item {{ Request::is('/') ? "active" : "" }}">
        <a class="nav-link" href="{{ route('main') }}">الرئيسية</a>
      </li>
      <li class="nav-item {{ Request::is('blog') ? "active" : "" }}">
        <a class="nav-link" href="{{ route('blog') }}">المدونة</a>
      </li>
      <li class="nav-item {{ Request::is('about') ? "active" : "" }}">
        <a class="nav-link" href="{{ route('about') }}">عن المؤسسة</a>
      </li>
      <li class="nav-item {{ Request::is('contact-us') ? "active" : "" }}">
        <a class="nav-link" href="{{ route('contact') }}">تواصل معنا</a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      @guest
      <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">تسجيل الدخول</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
      @else
      <!-- Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">لوحة التحكم</a>
        <div class="dropdown-menu dropdown-default dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item text-center waves-effect waves-light" href="{{ route('dash') }}">الرئيسية</a>
          <a class="dropdown-item text-center waves-effect waves-light" href="#">الكورسات</a>
          <a class="dropdown-item text-center waves-effect waves-light" href="#">المتدربين</a>
          <a class="dropdown-item text-center waves-effect waves-light" href="{{ route('posts.index') }}">المدونة</a>
          <a class="dropdown-item text-center waves-effect waves-light" href="{{ route('logout') }}" onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
            تسجيل الخروج
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
          @endguest
        </div>
      </li>
    </ul>



    <!-- Links -->
    <!-- Collapsible content -->

</nav>
<!--/.Navbar-->
