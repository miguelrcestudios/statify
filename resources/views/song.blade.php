<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ URL::asset('css/web.css') }}" rel="stylesheet">
    <title>{{env('APP_NAME')}} - Cancion</title>
</head>
<body>
    <header class="menu">
        @include('layouts/header')
    </header>

    <section class="contenido">
        <img src="{{$song->album->images[0]->url}}" alt="" height="200px" width="200px">
        <p>{{$song->name}}</p>
        <p>
            @foreach ($song->artists as $artist)
                @if($loop->count == $loop->iteration)
                <a href="/artist/{{$artist->id}}">{{$artist->name }}</a>
                @else
                    <a href="/artist/{{$artist->id}}">{{$artist->name }}</a>,
                @endif
            @endforeach
        </p>
        <p>Popularidad: {{$song->popularity}}</p>
        <a href="{{$song->external_urls->spotify}}" target="blank" class="btnSpotify">Reproducir en Spotify</a>
    </section>
</body>
</html>