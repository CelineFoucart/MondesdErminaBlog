<x-app-layout>
    <x-slot name="pageTitle">{{ $pageTitle }}</x-slot>
    <x-slot name="headerAdmin">{{ $headerAdmin }}</x-slot>
    @if (isset($header))
        <x-slot name="header">{{ $header }}</x-slot>
    @endif

    <article>
        {{ $slot }}
    </article>
</x-app-layout>