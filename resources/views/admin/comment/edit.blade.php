<x-admin-layout>
    <x-slot name="pageTitle">Editer un commentaire</x-slot>
    <x-slot name="header">Editer un commentaire</x-slot>

    <div class="border rounded p-4 bg-white">
        <h2 class="mb-2 font-bold text-xl border-b border-gray-300">Modifier un commentaire</h2>
        <form action="" method="post">
            @csrf
            @method('PUT')

            <p class="mb-4">
                <span class="font-bold text-gray-700">Article :</span>
                <a href="{{ route('blog.show', $comment->blogPost) }}"> {{ $comment->blogPost->title }} </a> 
            </p>

            <x-input-label for="content" value="Auteur" />
            <x-text-input id="name" type="text" class="mt-1 mb-4 block w-full" :value="$comment->user->name" :disabled="true" />
            <x-input-label for="content" value="Contenu" />
            <x-textarea :value="$comment->content" :id="'content'" :name="'content'"></x-textarea>
            <x-input-error :messages="$errors->get('content')" class="mt-2" />
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                @php
                    $isChecked = old('is_validated', $comment->is_validated)
                @endphp
                    <input id="is_validated" @if($isChecked) checked @endif type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="is_validated">
                    <span class="ml-2 text-sm text-gray-600">Valider ?</span>
                </label>
            </div>
            <x-input-error :messages="$errors->get('is_validated')" class="mt-2" />

            <x-primary-button class="mt-4">
                Modifier
            </x-primary-button>
        </form>
    </div>
</x-admin-layout>