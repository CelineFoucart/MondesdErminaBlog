<x-app-layout>
    <x-slot name="headerBlog">Mes actualités</x-slot>
    <article class="grid grid-cols-4 gap-4 mt-10">
        <div class="col-span-3">
            @include('blog.partials.list', ['title' => 'Derniers articles'])
        </div>
        <x-search-post />
    </article>
</x-app-layout>