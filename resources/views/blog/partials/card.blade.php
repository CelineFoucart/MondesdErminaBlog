<section class="border rounded p-4 bg-white mb-2">
    <header class="mb-5">
        @include('blog.partials.post-info')
        <h3 class="font-bold text-2xl mb-2 text-gray-900 hover:text-gray-600">
            <a href="{{ route('blog.show', $blogPost) }}">{{ $blogPost->title }}</a>
        </h3>
        <p class="text-gray-700 text-base">{{ nl2br($blogPost->description) }}</p>
    </header>
    <footer class="pt-2">
        @foreach ($blogPost->categories as $category)
        <x-badge route="blog.category" :params="$category">{{ $category->title }}</x-badge>
        @endforeach
    </footer>
</section>