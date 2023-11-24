<x-admin-layout>
    <x-slot name="pageTitle">Voir un article</x-slot>
    <x-slot name="headerAdmin">{{ $blogPost->title }}</x-slot>
    <x-slot name="header">
        <x-breadcrumb :links="[ 
            ['route' => 'admin.post.index', 'title' => 'Articles', 'params' => []],
            ['route' => null, 'title' => $blogPost->title] 
        ]"></x-breadcrumb>
    </x-slot>

    <div class="border rounded p-4 bg-white">
        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="text-right mb-4">
            <a href="{{ route('admin.post.edit', $blogPost) }}" class="mt-4 text-white hover:text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 mr-1 rounded-lg text-sm px-3 py-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">
                <i class="bi bi-pencil-fill"></i> Editer
            </a>
            <a href="{{ route('admin.post.delete', $blogPost) }}" class="mt-4 text-white hover:text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 rounded-lg text-sm px-3 py-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">
                <i class="bi bi-trash-fill"></i> Supprimer
            </a>
        </div>
        <table class="w-full">
            <tbody>
                <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                    <th class="p-3 border bg-gray-50 align-top">Titre</th>
                    <td class="p-3 border">
                        <a href="{{ route('blog.show', $blogPost) }}">
                            {{ $blogPost->title }}
                        </a>
                    </td>
                </tr>
                <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                    <th class="p-3 border bg-gray-50 align-top">Categories</th>
                    <td class="p-3 border">
                        <ul>
                            @foreach ($blogPost->categories as $category)
                                <li>
                                    <a href="{{ route('blog.category', $category) }}">
                                        {{ $category->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
                <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                    <th class="p-3 border bg-gray-50">Auteur</th>
                    <td class="p-3 border">
                        {{ $blogPost->user->name }}
                    </td>
                </tr>
                <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                    <th class="p-3 border bg-gray-50 align-top">Description</th>
                    <td class="p-3 border">
                        {!! nl2br($blogPost->description) !!}
                    </td>
                </tr>
                <tr class="bg-white border dark:bg-gray-800 dark:border-gray-700">
                    <th class="p-3 border bg-gray-50 align-top">Contenu</th>
                    <td class="p-3 border">
                        {!! nl2br($blogPost->content) !!}
                    </td>
                </tr>
            </tbody>
        </table>
        
    </div>
</x-admin-layout>