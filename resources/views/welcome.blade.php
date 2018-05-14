<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
	<link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('css/btp.css')}}" rel="stylesheet" type="text/css">

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="container text-center">
                <div class="display-1">
		<br>
                    PCD
                </div>
		<p class="display-4 text-muted">Plano de Controle Disciplinar</p>
		<div class="mt-5">
			<img class="_logo" src="{{asset('img/emakersjr.png')}}">
		</div>
            </div>
        </div>
    </body>
</html>
