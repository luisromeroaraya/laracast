<x-layout> <!-- Defines the $slot in the layout file -->
        @foreach ($posts as $post)
        <article>
            <a href="/posts/{{$post->html}}"><h2>{{$post->title}}</h2></a>
            <h3>{{$post->date}}</h3>
            <div>
                <p>{{$post->excerpt}}</p>
            </div>
        </article>
        @endforeach
</x-layout>