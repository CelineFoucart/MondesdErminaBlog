<x-admin-layout>
    <x-slot name="pageTitle">Supprimer un article</x-slot>
    <x-slot name="headerAdmin">Supprimer un article</x-slot>
    <x-slot name="header">
        <x-breadcrumb :links="[ 
            ['route' => 'admin.post.index', 'title' => 'Articles', 'params' => []],
            ['route' => 'admin.post.show', 'title' => $blogPost->title, 'params' => $blogPost],
            ['route' => null, 'title' => 'Supprimer'] 
        ]"></x-breadcrumb>
    </x-slot>

    <div class="border rounded p-4 bg-white">
        <h2 class="mb-2 font-bold text-xl border-b text-red-600 border-gray-300">Supprimer un article</h2>
        <form method="post" action="{{ route('admin.post.destroy', $blogPost) }}">
            @csrf
            @method('delete')
            <p class="mt-1 text-sm text-red-600 text-gray-600">
                Voulez-vous vraiment supprimer 
                <a href="{{ route('blog.show', $blogPost) }}" class="text-red-600 font-bold">{{ $blogPost->title }}</a> ? 
                Attention, toute suppression des définitive.
            </p>

            <x-danger-button class="mt-3">
                Supprimer
            </x-danger-button>
        </form>
    </div>
</x-admin-layout>