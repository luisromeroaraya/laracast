<x-layout> <!-- Defines the $slot in the layout file -->
        @foreach ($posts as $post)
        <article>
            <a href="/posts/{{$post->slug}}"><h2>{{$post->title}}</h2></a>
            <p>Created at: {{$post->created_at}}</p>
            <p>Category: <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a></p>
            <div>
                <p>{{$post->excerpt}}</p>
            </div>
        </article>
        @endforeach
</x-layout>