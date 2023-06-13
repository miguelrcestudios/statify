<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ URL::asset('css/web.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/home.css') }}" rel="stylesheet">
    <title>{{env('APP_NAME')}} - Iniciar sesión</title>
</head>
<body>
    <section class="contenido">
        <header>
            <h1>Bienvenido a statify</h1>
            <h2>Descubre tus artistas y canciones más escuchados</h2>
        </header>
        <p>
            <a href="{{route('login')}}">Inicia sesión con Spotify</a>
        </p>
    </section>
</body>
</html>