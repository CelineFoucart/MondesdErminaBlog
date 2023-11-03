<x-app-layout>
    <x-slot name="headerBlog">{{ $blogPost->title }}</x-slot>
    <div class="grid grid-cols-4 gap-4 mt-10">
        <article class="border rounded p-5 bg-white mb-2 col-span-3">
            <header class="mb-5">
                @include('blog.partials.post-info')
                <h2 class="text-3xl tracking-tight text-gray-900 sm:text-5xl mb-4">{{ $blogPost->title }}</h2>
                <p class="text-gray-500 mb-4">{{ nl2br($blogPost->title) }}</p>
                @foreach ($blogPost->categories as $category)
                    <x-badge route="blog.category" :params="$category">{{ $category->title }}</x-badge>
                @endforeach
            </header>

            <div class="text-lg leading-8 pb-6">
                {{ nl2br($blogPost->content) }}
            </div>

            <section class="border-t pt-6">
                <h3 class="text-2xl">
                    @php $total = $blogPost->comments !== null ? $blogPost->comments->count() : 0; @endphp
                    {{ $total }} Commentaire{{ $total > 1 ? 's' : '' }}
                </h3>

                @if ($total === 0)
                    <p class="text-center text-gray-500">Aucun commentaire n'a été publié sur cet article.</p>
                @endif

                @guest
                    <p>
                        Pour poster un commentaire, <a href="{{ route('login') }}">connectez-vous</a>
                        ou <a href="{ route('register') }}">inscrivez-vous</a>.
                    </p>
                @endguest
            </section>
        </article>
        <x-search-post />
    </div>
</x-app-layout>