<x-app-layout>
    <x-slot name="pageTitle">{{ $blogPost->title }}</x-slot>
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

            <div id="app" data-post="{{ $blogPost->id }}"></div>
        </article>
        <x-search-post />
    </div>
</x-app-layout>