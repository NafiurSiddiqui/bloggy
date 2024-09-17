@props(['post'])

<div>
    <div class="main-container @error('body') border border-rose-500 @enderror">
        <div class="editor-container editor-container_classic-editor editor-container_include-block-toolbar"
            id="editor-container">
            <div class="editor-container__editor">
                <textarea id="editor" name="body">{{ isset($post) ? old('body', $post->body) : old('body') }}</textarea>
            </div>
        </div>
    </div>
    <x-form.error name="body" />
</div>
