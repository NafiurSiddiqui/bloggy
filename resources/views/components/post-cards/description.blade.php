@props(['post', 'limit'])
<section {{ $attributes->merge([
    'class' => 'mt-5 text-sm md:text-lg dark:text-darkText-100',
]) }}>
    {{-- {!! Str::limit($post->description, 150, ' ...') !!}<a href="/post/{{ $post->slug }}" --}}
    {!! isset($limit) ? Str::limit($post->description, $limit, ' ...') : $post->description !!} <a href="/post/{{ $post->slug }}"
        class ='transition-colors text-sm p-0  font-semibold underline dark:hover:text-darkTextHover-600'> Continue
        reading</a>
</section>
