<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'UIRRMS') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!--ckeditor--->
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

    <!--tinmce-->
    {{-- <script src="https://cdn.tiny.cloud/1/emyakx34h6c0piovd7upf1hwwtglyjsd53g05m2monisjig4/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> --}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/form.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nav.css') }}" rel="stylesheet">
</head>

<body>

        <nav id="nav1" class=" navbar navbar-expand-lg navbar-dark" style="background-color:#031d44;color:whitesmoke;">

                @guest
                <div style="display: flex; flex-direction: row;justify-content: space-between;width: 100%">



                    <a class="navbar-brand" href="{{ url('/home') }}">
                        <img src="{{url('images/udsmLogo.png')}}" alt="UIRRMS" style="width:80px;">

                    </a>
                    <h3 style="text-align: center;color: white;padding-top:13px">UDSM IMPREST REQUEST AND RETIREMENT <br>MANAGEMENT
                        SYSTEM</h3>


                    <a class="navbar-brand" href="{{ url('/home') }}">
                        <img src="{{url('images/logo.png')}}" alt="UIRRMS" style="width:80px;">

                    </a>
                </div>




                @endguest
                <div class="collapse navbar-collapse">
                @auth
                <!-- Left Side Of Navbar -->

                <div class="navbar-nav mr-auto">
                    <a class="navbar-brand" href="{{ url('/home') }}">
                        <img src="{{url('images/logo.png')}}" alt="UIRRMS" style="width:40px;">
                        {{ config('app.name', 'UIRMMS') }}
                    </a>
                </div>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endauth
                </ul>
            </div>

        </nav>

        <main id="content" class="py-4"  >
            @yield('content')

            @yield('scripts')
        </main>

</body>

</html>
