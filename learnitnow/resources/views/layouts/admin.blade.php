<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.3/css/intlTelInput.css" />
    <link href="{{ asset('assets/libs/slider/css/bootstrap-slider.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/libs/daterangepicker/daterangepicker.css') }}" rel="stylesheet"/>
    <!-- Material design icons -->
    <link href="{{ asset('assets/fonts/mdi/css/materialdesignicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/libs/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/libs/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/simcify.min.css') }}" rel="stylesheet">
    <!-- Signer CSS -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    
</head>
<body>
<header>
<div class="humbager">
        <i class="mdi mdi-menu"></i>
    </div>
    <!-- logo -->
    <div class="branding">
        <a href="{{ url('/overview') }}">
        @if(env('APP_LOGO') != '')
            <img src="{{ asset('uploads/app/'.env('APP_LOGO')) }}" alt="{{ env('APP_NAME') }}" />
        @else
            {{ env('APP_NAME') }}
        @endif
        </a>
    </div>

    <!-- Navigation -->
    <nav class="navigation">
        <ul class="nav navbar-nav">
          <li>
            <a href="{{ url('/overview') }}">Overview</a>
          </li>
          
          <li>
            <div class="dropdown">
                <span class="dropdown-toggle" data-toggle="dropdown">
                    Learning <i class="mdi mdi-menu-down-outline"></i>
                </span>
                <ul class="dropdown-menu profile-menu" role="menu" aria-labelledby="menu1">
                    <li role="presentation"><a role="menuitem" href="{{ url('course') }}"> <i class="mdi mdi-book-open"></i> Courses</a></li>
                    <li role="presentation"><a role="menuitem" href="{{ url('/admin/course/payments') }}"> <i class="mdi mdi-credit-card"></i> Payments</a></li>

                </ul>
            </div>
          </li>
          <li>
            <a href="{{ url('/admin/seo') }}">SEO</a>
          </li>

          <li class="close-menu"><a href=""><i class="mdi mdi-close-circle-outline"></i> Close</a></li>
        </ul>
    </nav>
 
    <!-- Right content -->
    <div class="header-right">
		  <div class="dropdown new-record">
        </div>
        <div class="dropdown">
            <span class="dropdown-toggle" data-toggle="dropdown">
                <span class="avatar">
                    @if(empty(Auth::user()->avatar))
                     <img src="{{ asset('uploads/avatar.png') }}" class="img-circle">
                    @else 
                     <img src="{{ asset('uploads/avatar/'.Auth::user()->avatar) }}" class="img-circle">
                    @endif
                </span>
                <span class="profile-name"> 
                    <span class="hidden-xs">{{ Auth::user()->name}} {{ Auth::user()->lname}}</span> 
                    <i class="mdi mdi-menu-down-outline"></i> 
                </span>
            </span>
            <ul class="dropdown-menu profile-menu" role="menu" aria-labelledby="menu1">
              <li role="presentation"><a role="menuitem" href="{{ url('/') }}" target="_blank"> <i class="mdi mdi-web"></i> Go To Website</a></li>
              <li role="presentation"><a role="menuitem" href="{{ url('admin/profile') }}"> <i class="mdi mdi-settings"></i> Settings</a></li> 
    
              <li role="presentation">
              <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <i class="mdi mdi-logout"></i>  {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form></li>
            </ul>
          </div>
    </div>
</header>
    <!-- <div id="app"> -
    

        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  
                    <nav class="navigation">
        <ul class="avbar-nav mr-auto nav navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('overview') }}">Overview</a>
          </li>
          
          <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Learning <i class="mdi mdi-menu-down-outline"></i>
                                </a>
            <div class="dropdown">
                <ul class="dropdown-menu profile-menu" role="menu" aria-labelledby="menu1">
                    <li class="nav-item" role="presentation"><a class="nav-link" role="menuitem" href="{{ url('/course')}}"> <i class="mdi mdi-book-open"></i> Courses</a></li>
                   
            
                </ul>
            </div>
          </li>
        </ul>
    </nav>
                    <!-- Right Side Of Navbar -->
                    <!-- <ul class="navbar-nav ml-auto">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Setting</a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
         </nav> -->

        
            @yield('content')
          <footer>
    <div class="footer-logo">
      <img src="{{ asset('uploads/app/'.env('APP_LOGO')) }}" class="img-responsive">
    </div>
    <p class="text-right pull-right">&copy; {{ date("Y") }} {{ env("APP_NAME") }} <span>•</span> All Rights Reserved.</p>
  </footer>
    </div>

</body>
</html>
