<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/mdb.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/webfonts/all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/toastr/toastr.min.css') }}">

    <!-- Scripts -->

</head>
<body>


   {{-- navigation bar start --}}
        <nav class="navbar navbar-expand-md navbar-light fixed-top bg-white shadow">
            <div class="container">
                @if (Auth())

                <a class="navbar-brand fw-bold" href="{{ route('blog.index') }}">
                   <i class="fab fa-mendeley mx-2"></i> {{ config('app.name', 'Laravel') }}
                </a>
                @else

                <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                   <i class="fab fa-mendeley mx-2"></i> {{ config('app.name', 'Laravel') }}
                </a>
                @endif


                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon "><i class="fas fa-bars mx-2"></i></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item fw-bold">
                            <a class="nav-link {{ Request::routeIs('blog.index')?'active':'' }}" href="{{ route('blog.index') }}"><i class="fas fa-house mx-2"></i>Home</a>
                        </li>
                        @guest


                            @if (Route::has('login'))
                                <li class="nav-item fw-bold">
                                    <a class="nav-link {{ Request::routeIs('login')?'active':'' }}" href="{{ route('login') }}"><i class="fas fa-lock-open mx-2"></i>{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item fw-bold">
                                    <a class="nav-link {{ Request::routeIs('register')?'active':'' }}" href="{{ route('register') }}"><i class="fas fa-lock mx-2"></i>{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item fw-bold">
                            <a class="nav-link {{ Request::routeIs('blog.create')?'active':'' }}" href="{{ route('blog.create') }}"><i class="fas fa-plus-circle mx-2"></i>Add post</a>
                        </li>
                            <li class="nav-item fw-bold dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  <i class="fas fa-user-graduate mx-2"></i>  {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
        </nav>
    {{-- navigation bar start --}}

     {{-- main content section start --}}
            <main class="py-5">
                <div class="container mt-5">
                    <div class="row justify-content-center ">

                            <div class="col-md-10 ">

                                @yield('content')
                            </div>



                    </div>
                </div>
            </main>
            <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
            <script src="{{asset('assets/js/jquery.js') }}"></script>
            <script src="{{asset('assets/toastr/toastr.min.js') }}"></script>
            @yield('scripts')
     {{-- main content section start --}}


    {{-- footer section start --}}

            <section id="footer" class="py-5">
                <div class="container">
                    <hr>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <p> copyright &copy; {{ date("Y") }}, <span> <i class="fw-bold"> artisans_pro </i></span></p>
                            <p>  <a href="https://github.com/mugerwa96" class="text-decoration-none text-dark"><i class="fab fa-github fs-5"></i></a> </p>
                        </div>
                    </div>
                </div>
            </section>
    {{-- footer section end --}}
</body>
</html>
