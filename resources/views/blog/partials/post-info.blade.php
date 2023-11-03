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