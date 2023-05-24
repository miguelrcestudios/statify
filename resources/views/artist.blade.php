<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ URL::asset('css/web.css') }}" rel="stylesheet">
    <title>{{env('APP_NAME')}} - {{$artist->name}}</title>
</head>
<body>
<h2>Artista</h2>
    
    @if (isset($artist->images[0]))
        <img src="{{$artist->images[0]->url}}" alt="" height="200px" width="200px">
    @else
        <p><img src="{{URL::asset('img/usuario.png')}}" alt="" height="200px" width="200px"></p>
    @endif
    <p>{{$artist->name}}</p>
    <p>{{$artist->followers->total}} seguidores</p>
    <p>Popularidad: {{$artist->popularity}}</p>
    <a href="{{$artist->external_urls->spotify}}" target="blank"><button>Abrir en Spotify</button></a>
    <section>
        <h4>Géneros</h4>
        @forelse ($artist->genres as $genre)
        <article class="genre">
            <p>{{$genre}}</p>
        </article>
        @empty
            <p>No tiene generos asignados</p>
        @endforelse
    </section>

</body>
</html>