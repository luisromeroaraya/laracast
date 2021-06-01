<x-layout> <!-- Defines the $slot in the layout file -->
    @include ("posts._header")
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">           
        @if ($posts->count())
        <x-posts-grid :posts="$posts"/>
        {{$posts->links()}} <!-- This adds automatically the links to the pagination in Tailwind format -->
        @else
            <p class="text-center">No posts yet. Please check back later.</p>
        @endif
    </main>
</x-layout>