<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Onserfgoed</title>
        <meta name="description" content="Onserfgoed.eu het grootste archief met molens, kerken, klokkenstoelen, hunebedden, gemeentehuizen, dorpspompen, wegkapelletjes en meer."/>
        <meta name="keywords" content="onserfgoed.eu,molens,windmolen,watermolen,molen,kerken,kerk,klokkestoelen,hunebedden">
		<meta http-equiv="Content-Language" content="en-us">
		<meta name="author" content="Wiebe Eling de Boer">
		<meta name="copyright" content="2020 Wiebe Eling de Boer">
		<meta name="date" content="2020-12-29">
		<meta name="robots" content="INDEX, FOLLOW">
		<!--app scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <!--laravel app Styles -->

	<!-- Styles -->
	<link href="{{ asset('css/main.css') }}" rel="stylesheet">
   <!-- Fonts -->
    <!--jquery-->
	<link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
    <!--bootstrap-->
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    </head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Onserfgoed') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>