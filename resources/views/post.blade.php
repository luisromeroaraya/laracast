<x-layout> <!-- Defines the $slot in the layout file -->
    <article>
        <h1>{{$post->title}}</h1>
        <p>Created at: {{$post->created_at}}</p>
        <p>Category: <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a></p>
        <div>
            {!!$post->body!!} <!-- !! forces Blade to render it as HTML -->
        </div>
    </article>
    <a href="/">Go Back</a>
</x-layout>