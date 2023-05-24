<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ URL::asset('css/web.css') }}" rel="stylesheet">
    <title>{{env('APP_NAME')}} - Perfil</title>
</head>
<body>
    <h2>Perfil del Usuario</h2>

    {{-- @extends('layouts.app') --}}
    {{-- @section('content') --}}
    @if (isset($profile->images[0]))
        <img src="{{$profile->images[0]->url}}" alt="" height="200px" width="200px">
    @else
        <p><img src="{{URL::asset('img/usuario.png')}}" alt="" height="200px" width="200px"></p>
    @endif

    <h2>{{$profile->display_name}}</h2>
    <p>{{$profile->followers->total}} seguidores</p>
    <a href="{{$profile->external_urls->spotify}}" target="blank"><button>Abrir en Spotify</button></a>

    @if ($profile->country == 'ES')
        <img src="{{URL::asset('img/banderas/'.$profile->country.'.png')}}" alt="Bandera de {{$profile->country}}" height="50px">
    @else
        <p>{{$profile->country}}</p>
    @endif

    <section>
        <h3>Artistas</h3>
        <p><a href="/artists/short_term">4 semanas</a></p>
        <p><a href="/artists/medium_term">6 meses</a></p>
        <p><a href="/artists/long_term">Siempre</a></p>
        <?php $i = 0 ?>
        @forelse ($artists->items as $artist)
            <?php $i++ ?>
            <article>
                <img src="{{$artist->images[0]->url}}" alt="" width="100px"> 
                <p>{{$i}}. <a href="/artist/{{$artist->id}}">{{$artist->name }}</a></p>
            </article>
        @empty
            <p>No hay artistas</p>
        @endforelse
    </section>

    <section>
        <h3>Canciones</h3>
        <p><a href="/songs/short_term">4 semanas</a></p>
        <p><a href="/songs/medium_term">6 meses</a></p>
        <p><a href="/songs/long_term">Siempre</a></p>
        <?php $i = 0 ?>
        @forelse ($songs->items as $song)
            <?php $i++ ?>
            <article>
                <img src="{{$song->album->images[0]->url}}" alt="" width="100px"> 
                <p>{{$i}}. <a href="/song/{{$song->id}}">{{ $song->name }}</a></p>
                <p>
                    @foreach ($song->artists as $artist)
                        @if($loop->count == $loop->iteration)
                            <a href="/artist/{{$artist->id}}">{{$artist->name }}</a>
                        @else
                            <a href="/artist/{{$artist->id}}">{{$artist->name }}</a>,
                        @endif
                    @endforeach
                </p>
            </article>
        @empty
            <p>No hay canciones</p>
        @endforelse
    </section>
    {{-- @endsection --}}
    
</body>
</html>