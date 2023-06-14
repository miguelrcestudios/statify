<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ URL::asset('css/web.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/profile.css') }}" rel="stylesheet">
    <title>{{env('APP_NAME')}} - Perfil</title>
</head>
<body>
    <header class="menu">
        @include('layouts/header')
    </header>
    
    <section class="contenido">
        <section class="perfil">
            @if (isset($profile->images[0]))
            <img src="{{$profile->images[0]->url}}" alt="Imagen de perfil" class="imgPerfil" height="200px" width="200px">
            @else
            <img src="{{URL::asset('img/usuario.png')}}" alt="Imagen de perfil" class="imgPerfil" height="200px" width="200px">
            @endif
            
            <h2 class="usuario">{{$profile->display_name}}</h2>
            <p class="seguidores">{{$profile->followers->total}} seguidores</p>
            <a href="{{$profile->external_urls->spotify}}" target="blank" class="btnSpotify">Abrir en Spotify</a>
            
            @if ($profile->country == 'ES')
                <p><img src="{{URL::asset('img/banderas/'.$profile->country.'.png')}}" alt="Bandera de {{$profile->country}}" class="nacionalidad" height="50px"> España</p>
            @else
                <p class="nacionalidad">{{$profile->country}}</p>
            @endif
        </section>        

        <section>
            <section class="submenu">
                <h3>Artistas</h3>
                <a href="/artists/short_term" class="green">4 semanas</a>
                <a href="/artists/medium_term">6 meses</a>
                <a href="/artists/long_term">Siempre</a>
            </section>
            <section class="artists">
                <?php $i = 0 ?>
                @forelse ($artists->items as $artist)
                    <?php $i++ ?>
                    <article class="artist">
                        <img src="{{$artist->images[0]->url}}" alt="" class="imagen"> 
                        <p>{{$i}}. <a href="/artist/{{$artist->id}}">{{$artist->name }}</a></p>
                    </article>
                    @empty
                    <p>No hay artistas</p>
                @endforelse
            </section>
        </section>
        
        <section>
            <section class="submenu">                
                <h3>Canciones</h3>
                    <a href="/songs/short_term" class="green">4 semanas</a>
                    <a href="/songs/medium_term">6 meses</a>
                    <a href="/songs/long_term">Siempre</a>
            </section>
            <section class="songs">
                <?php $i = 0 ?>
                @forelse ($songs->items as $song)
                <?php $i++ ?>
                <article class="song">
                    <img src="{{$song->album->images[0]->url}}" alt="" class="imagen"> 
                    <p>{{$i}}. <a href="/song/{{$song->id}}">{{ $song->name }}</a></p>
                    <p>
                        @foreach ($song->artists as $artist)
                        @if($loop->count == $loop->iteration)
                        <a href="/artist/{{$artist->id}}" class="artistSong">{{$artist->name }}</a>
                        @else
                        <a href="/artist/{{$artist->id}}" class="artistSong">{{$artist->name }}</a>,
                        @endif
                        @endforeach
                        </p>
                    </article>
                @empty
                    <p>No hay canciones</p>
                @endforelse
            </section>
        </section>    
    </section>
</body>
</html>