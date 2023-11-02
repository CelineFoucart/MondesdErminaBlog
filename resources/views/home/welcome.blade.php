<x-app-layout>
    <x-slot name="headerBlog">Les mondes d'Ermina</x-slot>

    <div class="py-12">
        <article>
            <header class="pb-10">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl md:text-6xl">Actualités</h2>
                <p class="mt-2 text-lg leading-8 text-gray-600">Les derniers articles publiés sur le blog</p>
            </header>

            @forelse ($blogPosts as $blogPost)
                @include('blog.partials.card')
            @empty
                @include('blog.partials.empty')
            @endforelse
        </article>
    </div>
</x-app-layout>
