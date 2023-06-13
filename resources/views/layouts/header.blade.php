<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ URL::asset('css/header.css') }}" rel="stylesheet">
    <title>Header</title>
</head>
<body>
    <ul class="header">
        <a href="{{route('profile')}}">            
            <li>Perfil</li>
        </a>
        <a href="/artists/short_term">
            <li>Artistas</li>
        </a>
        <a href="/songs/short_term">
            <li>Canciones</li>
        </a>
    </ul>
</body>
</html>