<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ URL::asset('css/web.css') }}" rel="stylesheet">
    <title>{{env('APP_NAME')}} - Artistas</title>
</head>
<body>
    <header class="menu">
        @include('layouts/header')
    </header>

    <section class="contenido">
        <section class="submenu">
            <h3>Artistas</h3>
            <a href="/artists/short_term" @if($tiempo == 'short_term') class="green" @endif>4 semanas</a>
            <a href="/artists/medium_term" @if($tiempo == 'medium_term') class="green" @endif>6 meses</a>
            <a href="/artists/long_term" @if($tiempo == 'long_term') class="green" @endif>Siempre</a>
        </section>
        <section class="artists">
            <?php $i = 0 ?>
            @forelse ($artists->items as $artist)
            <?php $i++ ?>
            <article class="artist">
                <img src="{{$artist->images[0]->url}}" alt="" width="100%"> 
                <p>{{$i}}. <a href="/artist/{{$artist->id}}">{{$artist->name }}</a></p>
            </article>
            @empty
            <p>No hay artistas</p>
            @endforelse
        </section>
    </section>
</body>
</html>