<section class="border rounded p-4 bg-white mb-3">
    <header class="mb-5">
        <div class="text-gray-500 text-sm">
            <time datetime="{{ $blogPost->created_at->format('Y-m-d H:i') }}">
                Publié le <strong>{{ $blogPost->created_at->format('d/m/Y H:i') }}</strong>,
            </time>
            par
            @if ($blogPost->user !== null)
                <strong>{{ $blogPost->user->name }}</strong>
            @else
                <strong>Anonyme</strong>
            @endif
        </div>
        <h3 class="font-bold text-2xl mb-2 text-gray-900 hover:text-gray-600">
            <a href="{{ route('blog.show', $blogPost) }}">{{ $blogPost->title }}</a>
        </h3>
        <p class="text-gray-700 text-base">{{ nl2br($blogPost->description) }}</p>
    </header>
    <footer class="pt-2">
        @foreach ($blogPost->categories as $category)
        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">
            {{ $category->title }}
        </span>
        @endforeach
    </footer>
</section>