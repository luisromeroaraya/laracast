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
        <article>
            <h1>{{$post->title}}</h1>
            <div>
                {!!$post->body!!} <!-- !! forces Blade to render it as HTML -->
            </div>
            
        </article>
        <a href="/">Go Back</a>
    </body>
</html>