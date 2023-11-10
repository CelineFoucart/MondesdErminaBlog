<x-admin-layout>
    <x-slot name="pageTitle">Commentaires</x-slot>
    <x-slot name="header">Liste des commentaires</x-slot>


    <div class="border rounded p-4 bg-white">
        <table class="w-full">
            <thead class="text-left text-sm uppercase bg-gray-50 text-bold">
                <tr>
                    <th class="px-6 py-3">Article</th>
                    <th class="px-6 py-3">Auteur</th>
                    <th class="px-6 py-3">Date</th>
                    <th class="px-6 py-3">Validé</th>
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
                        <td class="px-6 py-4">{{ $comment->is_validated ? 'Oui' : 'Non' }}</td>
                    </tr>
                @empty
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4" colspan="4">Aucun commentaires</td>
                    </tr>
                @endforelse
            </body>
        </table>
        <div class="my-4">
            {{ $comments->links() }}
        </div>        
    </div>
</x-admin-layout>