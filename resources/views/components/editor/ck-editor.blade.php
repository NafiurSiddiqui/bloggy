@props(['post'])

<textarea id="editor" name="body">{{ isset($post) ? old('body', $post->body) : old('body') }}</textarea>
