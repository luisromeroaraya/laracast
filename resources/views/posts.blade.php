<x-layout> <!-- Defines the $slot in the layout file -->
        @foreach ($posts as $post)
        <article>
            <a href="/posts/{{$post->slug}}"><h2>{{$post->title}}</h2></a>
            <p>
                Created by: <a href="/users/{{$post->user->username}}">{{$post->user->name}}</a><br> 
                Date: {{$post->created_at}}<br>
                Category: <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
            </p>
            <div>
                <p>{{$post->excerpt}}</p>
            </div>
        </article>
        @endforeach
</x-layout>