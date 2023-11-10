<x-app-layout>
    <x-slot name="pageTitle">{{ $pageTitle }}</x-slot>
    <x-slot name="headerAdmin">{{ $header }}</x-slot>

    <article>
        {{ $slot }}
    </article>
</x-app-layout>