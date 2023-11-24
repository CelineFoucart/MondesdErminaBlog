<x-admin-layout>
    <x-slot name="pageTitle">Supprimer un commentaire</x-slot>
    <x-slot name="headerAdmin">Supprimer un commentaire</x-slot>
    
    <x-slot name="header">
        <x-breadcrumb :links="[ 
            ['route' => 'admin.comment.index', 'title' => 'Commentaires', 'params' => []],
            ['route' => null, 'title' => 'Suppression'] 
        ]"></x-breadcrumb>
    </x-slot>

    <div class="border rounded p-4 bg-white">
        <h2 class="mb-2 font-bold text-xl border-b text-red-600 border-gray-300">Supprimer un commentaire</h2>
        <form method="post" action="{{ route('admin.comment.destroy', $comment) }}">
            @csrf
            @method('delete')
            <p class="mt-1 text-sm text-red-600 text-gray-600">
                Voulez-vous vraiment supprimer ce commentaire de {{ $comment->user->name }} ? Attention, toute suppression des définitive.
            </p>

            <x-danger-button class="mt-3">
                Supprimer
            </x-danger-button>
        </form>
    </div>
</x-admin-layout>