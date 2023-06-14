<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ URL::asset('css/web.css') }}" rel="stylesheet">
    <title>{{env('APP_NAME')}} - Canciones</title>
</head>
<body>
    <header class="menu">
        @include('layouts/header')
    </header>
    
    <section class="contenido">
        <section class="submenu">                
            <h3>Canciones</h3>
                <a href="/songs/short_term" @if($tiempo == 'short_term') class="green" @endif>4 semanas</a>
                <a href="/songs/medium_term" @if($tiempo == 'medium_term') class="green" @endif>6 meses</a>
                <a href="/songs/long_term" @if($tiempo == 'long_term') class="green" @endif>Siempre</a>
        </section>
        <section class="songs">
            <?php $i = 0 ?>
            @forelse ($songs->items as $song)
            <?php $i++ ?>
            <article>
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
</body>
</html>