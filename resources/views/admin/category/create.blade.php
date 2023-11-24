<x-admin-layout>
    <x-slot name="pageTitle">Créer une catégorie</x-slot>
    <x-slot name="headerAdmin">Créer une catégorie</x-slot>
    <x-slot name="header">
        <x-breadcrumb :links="[ 
            ['route' => 'admin.category.index', 'title' => 'Catégories', 'params' => []],
            ['route' => null, 'title' => 'Créer'] 
        ]"></x-breadcrumb>
    </x-slot>

    @include('admin.category.form')
</x-admin-layout>