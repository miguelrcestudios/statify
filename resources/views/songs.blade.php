<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('APP_NAME')}} - Canciones</title>
</head>
<body>
    <section>
        <h3>Canciones</h3>
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
</body>
</html>