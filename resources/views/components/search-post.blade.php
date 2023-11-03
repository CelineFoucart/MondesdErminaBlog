<aside class="border rounded p-4 bg-white mb-3">
    <h3 class="mb-4 font-bold text-xl border-b-2 border-gray-300">Filtrer</h3>

    <form action="{{ request()->routeIs('blog.show') ? route('blog.index') : '' }}" method="get">
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