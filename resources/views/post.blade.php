<x-layout> <!-- Defines the $slot in the layout file -->
    <article>
        <h1>{{$post->title}}</h1>
        <div>
            {!!$post->body!!} <!-- !! forces Blade to render it as HTML -->
        </div>
    </article>
    <a href="/">Go Back</a>
</x-layout>