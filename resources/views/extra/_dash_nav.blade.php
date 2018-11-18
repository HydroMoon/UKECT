<nav class="navbar navbar-expand-lg navbar-light bg-light fixed">
  <a class="navbar-brand" href="#">المؤسسة البريطانية</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item {{ Request::is('/') ? "active" : "" }}">
        <a class="nav-link" href="#">الرئيسية</a>
      </li>
      <li class="nav-item {{ Request::is('blog') ? "active" : "" }}">
        <a class="nav-link" href="{{ route('blog') }}">المدونة</a>
      </li>
      <li class="nav-item {{ Request::is('/') ? "active" : "" }}">
        <a class="nav-link" href="#">عن المؤسسة</a>
      </li>
    </ul>

    <!-- Right Side Of Navbar -->
    <ul class="nav navbar-nav">
      <!-- Authentication Links -->
      @guest
      <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
      @else
      <li class="dropdown nav-item">
        <a class="nav-link {{ Request::is('dash') ? "active" : "" }}" href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
          &#9881;
        </a>
        <ul class="dropdown-menu dropdown-menu-right">
          <li class="nav-item">
            <a class="nav-link text-center" href="{{ route('dash') }}">لوحة التحكم</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-center" href="#">الكورسات</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-center" href="#">المتدربين</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-center {{ Request::is('posts') ? "active" : "" }}" href="{{ route('posts.index') }}">المدونة</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-center" href="#">المستخدمين</a>
          </li>


          <li class="nav-item">
            <a class="nav-link text-center" href="{{ route('logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
              تسجيل الخروج
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
          </li>
        </ul>
      </li>
      @endguest
    </ul>
  </div>
</nav>
