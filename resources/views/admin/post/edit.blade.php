<x-admin-layout>
    <x-slot name="pageTitle">Editer un article</x-slot>
    <x-slot name="headerAdmin">Editer un article</x-slot>
    <x-slot name="header">
        <x-breadcrumb :links="[ 
            ['route' => 'admin.post.index', 'title' => 'Articles', 'params' => []],
            ['route' => 'admin.post.show', 'title' => $blogPost->title, 'params' => $blogPost],
            ['route' => null, 'title' => 'Editer'] 
        ]"></x-breadcrumb>
    </x-slot>

    @include('admin.post.form')
</x-admin-layout>