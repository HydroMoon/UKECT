<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark purple-gradient">

    <!-- Navbar brand -->
    <a class="navbar-brand" href="{{ route('main') }}">Omdurman College</a>
  
    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
  
      <!-- Links -->
      <ul class="navbar-nav mr-auto">
        <li class="nav-item {{ Request::is('/') ? "active" : "" }}">
          <a class="nav-link" href="{{ route('main') }}">Home</a>
        </li>
        <li class="nav-item {{ Request::is('long-courses') ? "active" : "" }}">
              <a class="nav-link" href="{{ route('long') }}">Programs</a> 
        </li>
        {{-- <li class="nav-item {{ Request::is('blog') ? "active" : "" }}">
          <a class="nav-link" href="{{ route('blog') }}">Blog</a>
        </li> --}}
        {{-- <li class="nav-item {{ Request::is('about') ? "active" : "" }}">
          <a class="nav-link" href="{{ route('about') }}">About us</a>
        </li> --}}
        <li class="nav-item {{ Request::is('contact-us') ? "active" : "" }}">
          <a class="nav-link" href="{{ route('contact') }}">Contact us</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('lang', 'ar') }}">عربي</a>
        </li>
      </ul>
  
      <ul class="navbar-nav ml-auto">
        @if (Auth::guard('admin')->check())
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dashboard</a>
            <div class="dropdown-menu dropdown-default dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item text-center waves-effect waves-light" href="{{ route('dash') }}">Home</a>
              @role('admin')
              <a class="dropdown-item text-center waves-effect waves-light" href="{{ route('admin.courses') }}">Courses & Programs</a>
              <a class="dropdown-item text-center waves-effect waves-light" href="{{ route('admin.teacher') }}">Supervisors</a>
              <a class="dropdown-item text-center waves-effect waves-light" href="{{ route('users') }}">Users</a>
              <a class="dropdown-item text-center waves-effect waves-light" href="{{ route('admin.message') }}">Messages</a>
              @endrole
              @role('teacher')
              <a class="dropdown-item text-center waves-effect waves-light" href="{{ route('admin.courses.get') }}">Courses & Programs</a>
              @endrole
              <a class="dropdown-item text-center waves-effect waves-light" href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                Logout
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
            <a class="dropdown-item text-center waves-effect waves-light" href="{{ route('user.dash') }}">Dashboard</a>
            <a class="dropdown-item text-center waves-effect waves-light" href="{{ route('user.courses.show', auth()->user()->spec_id) }}">Courses & Quizzes</a>
            <a class="dropdown-item text-center waves-effect waves-light" href="{{ route('logout') }}" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
              Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
          </div>
        </li>
        @else
        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
        @endif
      </ul>
  
  </nav>
  <!--/.Navbar-->
  