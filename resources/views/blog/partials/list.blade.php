<h2 class="text-3xl tracking-tight text-gray-900 sm:text-5xl mb-6">{{ $title }}</h2>
@if (isset($description) && $description !== null)
    <p>{{ nl2br($description) }}</p>
@endif
<div class="grid grid-cols-2 gap-4 mt-3">
    @forelse ($blogPosts as $blogPost)
        @include('blog.partials.card')
    @empty
        @include('blog.partials.empty')
    @endforelse
</div>
<div class="my-4">
    {{ $blogPosts->links() }}
</div>
