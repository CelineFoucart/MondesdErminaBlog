<div class="border rounded p-4 bg-white">
    <h2 class="mb-2 font-bold text-xl border-b border-gray-300">Categorie</h2>

    <form action="{{ route(($category->exists) ? 'admin.category.update' : 'admin.category.store', $category) }}" method="post">
        @csrf
        @method(($category->exists) ? 'put': 'post')

        <x-input-label for="content" value="Titre" />
        <x-text-input :id="'title'" :name="'title'" type="text" class="mb-4 block w-full" :value="old('title', $category->title)" ></x-text-input>
        <x-input-error :messages="$errors->get('title')" class="mt-2" />

        <x-input-label for="description" value="Description" />
        <x-textarea :value="old('description', $category->description)" :id="'description'" :name="'description'"></x-textarea>
        <x-input-error :messages="$errors->get('content')" class="mt-2" />

        <x-primary-button class="mt-4">
            Enregistrer
        </x-primary-button>
    </form>
</div>