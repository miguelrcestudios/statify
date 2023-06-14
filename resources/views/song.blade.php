<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ URL::asset('css/web.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/song.css') }}" rel="stylesheet">
    <title>{{env('APP_NAME')}} - Cancion</title>
</head>
<body>
    <header class="menu">
        @include('layouts/header')
    </header>

    <section class="contenido">
        <section class="song">
            <img src="{{$song->album->images[0]->url}}" alt="" class="imagen">
            <h2 class="titulo">{{$song->name}}</h2>
            <p class="artistas">
                @foreach ($song->artists as $artist)
                    @if($loop->count == $loop->iteration)
                    <a href="/artist/{{$artist->id}}" class="artistSong">{{$artist->name }}</a>
                    @else
                        <a href="/artist/{{$artist->id}}" class="artistSong">{{$artist->name }}</a>,
                    @endif
                @endforeach
            </p>
            <p class="popularidad">Popularidad: {{$song->popularity}}</p>
            <a href="{{$song->external_urls->spotify}}" target="blank" class="btnSpotify">Reproducir en Spotify</a>
            </section>
    </section>
</body>
</html>