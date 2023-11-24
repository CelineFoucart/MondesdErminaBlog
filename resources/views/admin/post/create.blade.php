<x-admin-layout>
    <x-slot name="pageTitle">Créer un article</x-slot>
    <x-slot name="headerAdmin">Créer un article</x-slot>
    <x-slot name="header">
        <x-breadcrumb :links="[ 
            ['route' => 'admin.post.index', 'title' => 'Articles', 'params' => []],
            ['route' => null, 'title' => 'Créer'] 
        ]"></x-breadcrumb>
    </x-slot>

    @include('admin.post.form')
</x-admin-layout>