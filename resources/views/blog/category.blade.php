<x-app-layout>
    <x-slot name="headerBlog">{{ $category->title }}</x-slot>
    <p class="text-center">
        {{ $category->description }}
    </p>
    <article class="grid grid-cols-4 gap-4 mt-10">
        <div class="col-span-3">
            @include('blog.partials.list', [
                'title' => 'Derniers articles de "' . $category->title . '"',
                'description' => $category->description
            ])
        </div>
        <x-search-post />
    </article>
</x-app-layout>