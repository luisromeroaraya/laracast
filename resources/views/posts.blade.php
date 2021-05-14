<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>My First Laravel App - My Blog</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="/app.css">
    </head>
    <body>
        @foreach ($posts as $post)
        <article>
            <a href="/posts/{{$post->html}}"><h2>{{$post->title}}</h2></a>
            <h3>{{$post->date}}</h3>
            <div>
                <p>{{$post->excerpt}}</p>
            </div>
        </article>
        @endforeach
    </body>
</html>