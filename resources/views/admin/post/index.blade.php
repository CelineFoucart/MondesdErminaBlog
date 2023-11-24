<x-admin-layout>
    <x-slot name="pageTitle">Articles</x-slot>
    <x-slot name="headerAdmin">Liste des articles</x-slot>
    <x-slot name="header">
        <x-breadcrumb :links="[['route' => null, 'title' => 'Articles'] ]"></x-breadcrumb>
    </x-slot>

    <div class="border rounded p-4 bg-white">
        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="text-right">
            <a href="{{ route('admin.post.create') }}" class=" mb-3 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                Ajouter
            </a>
        </div>

        <table class="w-full">
            <thead class="text-left text-sm uppercase bg-gray-50 text-bold">
                <tr>
                    <th class="px-6 py-3">Titre</th>
                    <th class="px-6 py-3">Slug</th>
                    <th class="px-6 py-3">Auteur</th>
                    <th class="px-6 py-3">Date</th>
                    <th class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <body>
                @forelse ($blogPosts as $blogPost)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">
                            <a href="{{ route('blog.show', $blogPost) }}">
                                {{ $blogPost->title }}
                            </a>
                        </td>
                        <td class="px-6 py-4">{{ $blogPost->slug}}</td>
                        <td class="px-6 py-4">{{ $blogPost->user->name }}</td>
                        <td class="px-6 py-4">{{ $blogPost->created_at->format('d/m/Y H:i') }}</td>
                        <td class="px-6 py-4">  
                            <a href="{{ route('admin.post.show', $blogPost) }}" class="mt-4 text-white hover:text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 mr-1 rounded-lg text-sm px-3 py-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">
                                <i class="bi bi-eye-fill"></i> <span class="sr-only">Voir</span>
                            </a>
                            <a href="{{ route('admin.post.edit', $blogPost) }}" class="mt-4 text-white hover:text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 mr-1 rounded-lg text-sm px-3 py-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">
                                <i class="bi bi-pencil-fill"></i> <span class="sr-only">Editer</span>
                            </a>
                            <a href="{{ route('admin.post.delete', $blogPost) }}" class="mt-4 text-white hover:text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 rounded-lg text-sm px-3 py-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">
                                <i class="bi bi-trash-fill"></i> <span class="sr-only">Supprimer</span>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="py-2" colspan="4">Aucun articles</td>
                    </tr>
                @endforelse
            </body>
        </table>
        <div class="my-4">
            {{ $blogPosts->links() }}
        </div>        
    </div>
</x-admin-layout>