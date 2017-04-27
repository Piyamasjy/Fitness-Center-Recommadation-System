<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    
                    <!-- Collapsed Hamburger -->
                   <!--  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button> -->

                    <!-- Branding Image -->
                    {{-- <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a> --}}
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <div id="navigation">
                              <ul>
                                <li class="{{ Request::is('user/index') ? 'selected' : '' }}">
                                  <a href="/user/index">หน้าหลัก</a>
                                </li>
                                <li  class="{{ Request::is('login') ? 'selected' : '' }}">
                                  <a href="{{ route('login') }}">เข้าสู่ระบบ</a>
                                </li>
                                <li class="{{ Request::is('register') ? 'selected' : '' }}">
                                  <a href="{{ route('register') }}">ลงทะเบียน</a>
                                </li>
                                <li class="{{ Request::is('user/class_type') ? 'selected' : '' }}">
                                  <a href="/user/class_type">คำอธิบายคลาส</a>
                                </li>
                                
                              </ul>
                            </div>
                            <!-- <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li> -->
                        @else
                            <div id="navigation_member">
                              <ul>
                                <li class="{{ Request::is('member/index') ? 'selected' : '' }}">
                                  <a href="/member/index">หน้าหลัก</a>
                                </li>
                                <li class="{{ Request::is('member/profile') ? 'selected' : '' }}">
                                  <a href="/member/profile">ชื่อผู้ใช้:{{ Auth::user()->username }}</a>
                                </li>
                                <li class="{{ Request::is('member/class_type') ? 'selected' : '' }}">
                                  <a href="/member/class_type">คำอธิบายคลาส</a>
                                </li>
                               {{--  <li>
                                   <a> ชื่อผู้ใช้:{{ Auth::user()->fname }}</a> 
                                </li> --}}
                                <li>
                                    <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                   ออกจากระบบ
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                    </form>
                              
                                {{-- <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul> --}}
                            </li>
                        </ul>
                            </div>
                        @endif
                    </ul>
                    
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
