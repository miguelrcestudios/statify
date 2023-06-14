<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ URL::asset('css/web.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/artist.css') }}" rel="stylesheet">
    <title>{{env('APP_NAME')}} - {{$artist->name}}</title>
</head>
<body>
    <header class="menu">
        @include('layouts/header')
    </header>
    
    <section class="contenido">    
        <section class="artist">
            @if (isset($artist->images[0]))
                <img src="{{$artist->images[0]->url}}" alt="" class="imagen">
            @else
                <p><img src="{{URL::asset('img/usuario.png')}}" alt="" class="imagen"></p>
            @endif
            <h2 class="nombre">{{$artist->name}}</h2>
            <p class="seguidores">{{$artist->followers->total}} seguidores</p>
            <p class="popularidad">Popularidad: {{$artist->popularity}}</p>
            <a href="{{$artist->external_urls->spotify}}" target="blank" class="btnSpotify">Abrir en Spotify</a>
            <section class="seccionGeneros">
                <h4>Géneros</h4>
                <section class="generos">
                    @forelse ($artist->genres as $genre)
                        <p class="genre">{{$genre}}</p>
                    @empty
                        <p>No tiene generos asignados</p>
                    @endforelse
                </section>
            </section>    
        </section>
    </section>
    
</body>
</html>