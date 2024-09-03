@props(['post'])

<div class="lg:flex justify-between mb-6">
    <a href="/post/{{ $post->slug }}"
        class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500 dark:text-darkText-100/50
                            dark:hover:text-darkTextHover-600">
        < Back to Post </a>
</div>
