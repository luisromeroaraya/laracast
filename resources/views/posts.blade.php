<x-layout> <!-- Defines the $slot in the layout file -->

    @include ("_posts-header")

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">           
        <!-- Featured post-->     
        <x-post-featured-card />
        <!-- End of featured post-->  

        <!-- 2 columns -->
        <div class="lg:grid lg:grid-cols-2">
            <x-post-card />
            <x-post-card />
        </div>
        <!-- End of 2 columns -->

        <!-- 3 columns -->
        <div class="lg:grid lg:grid-cols-3">
            <x-post-card />
            <x-post-card />
            <x-post-card />
        </div>
        <!-- End of 3 columns -->
    </main>

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