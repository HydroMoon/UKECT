<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark peach-gradient">

  <!-- Navbar brand -->
  <a class="navbar-brand" href="{{ route('main') }}">{{ Request::is('courses') ? "مركز يوكيكت للتدريب" : "المؤسسة البريطانية" }}</a>

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
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">الكورسات</a>
        <div class="dropdown-menu dropdown-default dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item text-center waves-effect waves-light" href="{{ route('short') }}">قصيرة الامد</a>
            <a class="dropdown-item text-center waves-effect waves-light" href="{{ route('long') }}">طويلة الامد</a>
        </div>
      </li>
      <li class="nav-item {{ Request::is('blog') ? "active" : "" }}">
        <a class="nav-link" href="{{ route('blog') }}">المدونة</a>
      </li>
      <li class="nav-item {{ Request::is('media') ? "active" : "" }}">
          <a class="nav-link" href="{{ route('media') }}">الوسائط</a>
        </li>
      <li class="nav-item {{ Request::is('about') ? "active" : "" }}">
        <a class="nav-link" href="{{ route('about') }}">عن المؤسسة</a>
      </li>
      <li class="nav-item {{ Request::is('contact-us') ? "active" : "" }}">
        <a class="nav-link" href="{{ route('contact') }}">تواصل معنا</a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      @if (Auth::guard('admin')->check())
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">لوحة التحكم</a>
          <div class="dropdown-menu dropdown-default dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item text-center waves-effect waves-light" href="{{ route('dash') }}">الرئيسية</a>
            <a class="dropdown-item text-center waves-effect waves-light" href="{{ route('admin.courses') }}">الكورسات</a>
            <a class="dropdown-item text-center waves-effect waves-light" href="{{ route('admin.teacher') }}">المدرسين</a>
            <a class="dropdown-item text-center waves-effect waves-light" href="{{ route('users') }}">المسجلين</a>
            <a class="dropdown-item text-center waves-effect waves-light" href="{{ route('posts.index') }}">المدونة</a>
            <a class="dropdown-item text-center waves-effect waves-light" href="{{ route('admin.image') }}">صور الغلاف</a>
            <a class="dropdown-item text-center waves-effect waves-light" href="{{ route('admin.message') }}">الرسائل</a>
            <a class="dropdown-item text-center waves-effect waves-light" href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
              تسجيل الخروج
            </a>
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
          </div>
        </li>
      @elseif (Auth::guard('web')->check())
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
        <div class="dropdown-menu dropdown-default dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item text-center waves-effect waves-light" href="{{ route('user.dash') }}">لوحة المتابعة</a>
          <a class="dropdown-item text-center waves-effect waves-light" href="{{ route('user.courses') }}">التسجيلات</a>
          <a class="dropdown-item text-center waves-effect waves-light" href="{{ route('logout') }}" onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
            تسجيل الخروج
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
        </div>
      </li>
      @else
      <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">تسجيل الدخول</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">تسجيل</a></li>
      @endif
    </ul>

</nav>
<!--/.Navbar-->
