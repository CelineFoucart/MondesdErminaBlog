<x-admin-layout>
    <x-slot name="pageTitle">Commentaires</x-slot>
    <x-slot name="headerAdmin">Liste des commentaires</x-slot>
    <x-slot name="header">
        <x-breadcrumb :links="[['route' => null, 'title' => 'Commentaires'] ]"></x-breadcrumb>
    </x-slot>

    <div class="border rounded p-4 bg-white">
        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full">
            <thead class="text-left text-sm uppercase bg-gray-50 text-bold">
                <tr>
                    <th class="px-6 py-3">Article</th>
                    <th class="px-6 py-3">Auteur</th>
                    <th class="px-6 py-3">Date</th>
                    <th class="px-6 py-3">Validé</th>
                    <th class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <body>
                @forelse ($comments as $comment)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">
                            <a href="{{ route('blog.show', $comment->blogPost) }}">
                                {{ $comment->blogPost->title }}
                            </a>
                        </td>
                        <td class="px-6 py-4">{{ $comment->user->name }}</td>
                        <td class="px-6 py-4">{{ $comment->created_at->format('d/m/Y H:i') }}</td>
                        <td class="px-6 py-4">
                            @if ($comment->is_validated)
                                <span class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                    <i class="bi bi-check2"></i> Oui
                                </span>
                            @else
                            <span class="bg-red-100 text-red-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
                                <i class="bi bi-x-lg"></i> Non
                            </span>
                            @endif
                        </td>
                        <td class="px-6 py-4">  
                            <a href="{{ route('admin.comment.edit', $comment) }}" class="mt-4 text-white hover:text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 mr-1 rounded-lg text-sm px-3 py-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">
                                <i class="bi bi-pencil-fill"></i> <span class="sr-only">Editer</span>
                            </a>
                            <a href="{{ route('admin.comment.delete', $comment) }}" class="mt-4 text-white hover:text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 rounded-lg text-sm px-3 py-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">
                                <i class="bi bi-trash-fill"></i> <span class="sr-only">Supprimer</span>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="py-2" colspan="4">Aucun commentaires</td>
                    </tr>
                @endforelse
            </body>
        </table>
        <div class="my-4">
            {{ $comments->links() }}
        </div>        
    </div>
</x-admin-layout>