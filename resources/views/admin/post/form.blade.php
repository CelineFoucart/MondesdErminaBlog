<div class="border rounded p-4 bg-white">
    <h2 class="mb-2 font-bold text-xl border-b border-gray-300">Article</h2>

    <form action="{{ route(($blogPost->exists) ? 'admin.post.update' : 'admin.post.store', $blogPost) }}" method="post">
        @csrf
        @method(($blogPost->exists) ? 'put': 'post')

        <x-input-label for="content" value="Titre" />
        <x-text-input :id="'title'" :name="'title'" type="text" class="mb-4 block w-full" :value="old('title', $blogPost->title)" ></x-text-input>
        <x-input-error :messages="$errors->get('title')" class="mt-2" />

        <x-input-label for="description" value="Description" />
        <x-textarea :value="old('description', $blogPost->description)" :id="'description'" :name="'description'"></x-textarea>
        <x-input-error :messages="$errors->get('content')" class="mt-2" />

        <x-input-label for="categories" value="Categories" />
        <x-multiple-input 
            :id="'categories'" 
            :name="'categories[]'" class="mb-4 block w-full" 
            :selected="$blogPost->categories()->pluck('id')"
            :options="$options">
        </x-multiple-input>
        <x-input-error :messages="$errors->get('categories')" class="mt-2" />

        <x-input-label for="content" value="Contenu" />
        <x-textarea :value="old('content', $blogPost->content)" :id="'content'" :name="'content'"></x-textarea>
        <x-input-error :messages="$errors->get('content')" class="mt-2" />

        <x-primary-button class="mt-4">
            Enregistrer
        </x-primary-button>
    </form>
</div>