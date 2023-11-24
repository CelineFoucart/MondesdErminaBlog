<x-admin-layout>
    <x-slot name="pageTitle">Editer une catégorie</x-slot>
    <x-slot name="headerAdmin">Editer une catégorie</x-slot>
    <x-slot name="header">
        <x-breadcrumb :links="[ 
            ['route' => 'admin.category.index', 'title' => 'Articles', 'params' => []],
            ['route' => 'admin.category.show', 'title' => $category->title, 'params' => $category],
            ['route' => null, 'title' => 'Editer'] 
        ]"></x-breadcrumb>
    </x-slot>

    @include('admin.category.form')
</x-admin-layout>