<x-admin-layout>
    <x-slot name="pageTitle">Supprimer une catégorie</x-slot>
    <x-slot name="headerAdmin">Supprimer une catégorie</x-slot>
    <x-slot name="header">
        <x-breadcrumb :links="[ 
            ['route' => 'admin.category.index', 'title' => 'Catégories', 'params' => []],
            ['route' => 'admin.category.show', 'title' => $category->title, 'params' => $category],
            ['route' => null, 'title' => 'Supprimer'] 
        ]"></x-breadcrumb>
    </x-slot>

    <div class="border rounded p-4 bg-white">
        <h2 class="mb-2 font-bold text-xl border-b text-red-600 border-gray-300">Supprimer une catégorie</h2>
        <form method="post" action="{{ route('admin.category.destroy', $category) }}">
            @csrf
            @method('delete')
            <p class="mt-1 text-sm text-red-600 text-gray-600">
                Voulez-vous vraiment supprimer <span class="text-red-600 font-bold">{{ $category->title }}</span> ? 
                Attention, toute suppression des définitive.
            </p>

            <x-danger-button class="mt-3">
                Supprimer
            </x-danger-button>
        </form>
    </div>
</x-admin-layout>