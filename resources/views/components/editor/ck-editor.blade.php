@props(['post'])

{{-- <textarea  id="editor" name="body">{{ isset($post) ? old('body', $post->body) : old('body') }}</textarea> --}}


<div>
    <div class="main-container">
        <div class="editor-container editor-container_classic-editor editor-container_include-block-toolbar"
            id="editor-container">
            <div class="editor-container__editor">
                <textarea id="editor" name="body">{{ isset($post) ? old('body', $post->body) : old('body') }}</textarea>
            </div>
        </div>
    </div>
</div>
