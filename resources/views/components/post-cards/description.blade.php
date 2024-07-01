@props(['post', 'limit'])
<section {{ $attributes->merge([
    'class' => 'mt-4',
]) }}>
    {{-- {!! Str::limit($post->description, 150, ' ...') !!}<a href="/post/{{ $post->slug }}" --}}
    {!! isset($limit) ? Str::limit($post->description, $limit, ' ...') : $post->description !!} <a href="/post/{{ $post->slug }}"
        class ='transition-colors text-sm p-0 text-gray-700 font-semibold underline hover:text-blue-500',>Continue
        reading</a>
</section>
