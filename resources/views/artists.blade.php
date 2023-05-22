<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('APP_NAME')}} - Artistas</title>
</head>
<body>
    <section>
        <h3>Artistas</h3>
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
</body>
</html>