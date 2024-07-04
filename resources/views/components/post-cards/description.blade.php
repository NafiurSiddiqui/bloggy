@props(['post', 'limit'])
<section {{ $attributes->merge([
    'class' => 'mt-5 text-sm md:text-lg text-gray-700',
]) }}>
    {{-- {!! Str::limit($post->description, 150, ' ...') !!}<a href="/post/{{ $post->slug }}" --}}
    {!! isset($limit) ? Str::limit($post->description, $limit, ' ...') : $post->description !!} <a href="/post/{{ $post->slug }}"
        class ='transition-colors text-sm p-0  font-semibold underline hover:text-blue-500'>Continue
        reading</a>
</section>
