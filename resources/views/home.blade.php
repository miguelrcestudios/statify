<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ URL::asset('css/web.css') }}" rel="stylesheet">
    <title>{{env('APP_NAME')}} - Iniciar sesión</title>
</head>
<body>
    <h1>Statify</h1>
    <p><a 
        style="background-color:green; color:white; text-decoration:none; border-radius: 5px; padding: .5em;"
        href="{{route('login')}}">Inicia sesión con Spotify
        </a></p>
</body>
</html>