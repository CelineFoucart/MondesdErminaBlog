<x-app-layout>
    <x-slot name="headerBlog">Mes actualités</x-slot>

    <article class="grid grid-cols-4 gap-4 mt-10">
        <div class="col-span-3">
            <h2 class="text-3xl tracking-tight text-gray-900 sm:text-5xl mb-6">Derniers articles</h2>
            <div class="grid grid-cols-2 gap-4 mt-3">
                @forelse ($blogPosts as $blogPost)
                    @include('blog.partials.card')
                @empty
                    @include('blog.partials.empty')
                @endforelse
            </div>
            <div class="my-4">
                {{ $blogPosts->links() }}
            </div>
        </div>
        <aside class="border rounded p-4 bg-white mb-3">
            <h3 class="mb-4 font-bold text-xl border-b-2 border-gray-300">Filtrer</h3>

            <form action="" method="get">
                <x-input-label for="title" value="Par mots clés" />
                <x-text-input id="title" class="block mt-1 mb-5 w-full bg-gray-50" type="text" name="title" :value="old('title')" />

                <x-input-label for="title" value="Nombre d'articles par page" />
                <x-select-input id="perPage" class="bg-gray-50 block w-full" name="perPage" :value="old('perPage')" :options="$perPageOptions" />
            
                <div class="text-right">
                    <x-primary-button class="mt-3">Rechercher</x-primary-button>
                </div>
            </form>

            <h3 class="mb-4 font-bold text-xl border-b-2 border-gray-300 mt-5">Catégories</h3>
            @foreach ($categories as $category)
                <x-badge route="blog.category" :params="$category">{{ $category->title }}</x-badge>
            @endforeach
        </aside>
    </article>

</x-app-layout>