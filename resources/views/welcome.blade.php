<!DOCTYPE html>
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
<body class="body-cards">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   Onserfgoed
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <!-- Authentication Links -->
            @if (Route::has('login'))
                
                    @auth
                        <li class="nav-item"><a class="nav-link" href="{{ url('/home') }}">Dashboard</a></li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>

                    @endauth
                
            @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                    </ul>
                </div>
            </div>
        </nav>
		<!--content-->
		<div class="main-welcome">
			<div class="vh-100">
				<main class="py-4">
					<div class="content">
						<div class="title m-b-md">
						Onserfgoed
						</div>
						<div class="main-links">
							<a href="/archive">Archief</a>
							<a href="/news">Nieuws</a>
							<a href="/updates">Updates</a>  
                            <a href="/search">Zoeken</a>     
						</div>  
					</div>	
				</main>
			</div>
		</div>
		
    </div>

</body>
</html>
