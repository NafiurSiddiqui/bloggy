@props(['post', 'limit'])
<section
    {{ $attributes->merge([
        'class' => 'mt-5 text-sm md:text-lg text-lightText-700 dark:text-darkText-100',
    ]) }}>
    {{-- {!! Str::limit($post->description, 150, ' ...') !!}<a href="/post/{{ $post->slug }}" --}}
    {!! isset($limit) ? Str::limit($post->description, $limit, ' ...') : $post->description !!}

    <x-text-link href="/post/{{ $post->slug }}" class="md:text-lg font-semibold">
        Continue Reading
    </x-text-link>
</section>
