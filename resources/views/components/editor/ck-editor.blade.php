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


<script>
    // ck.ck-menu-bar
    //ck.ck-toolbar.ck-toolbar_grouping
    // ck-blurred ck ck-content ck-editor__editable ck-rounded-corners ck-editor__editable_inline

    //upon dom loaded, add 'py-1' to the div that has the class ck.ck-menu-bar
    document.addEventListener('DOMContentLoaded', function() {
        const menuBar = document.querySelector('.ck-menu-bar');
        const toolbar = document.querySelector('.ck.ck-toolbar.ck-toolbar_grouping');
        const editor = document.querySelector('.ck-blurred.ck .ck-content .ck-editor__editable');

        console.log([
            menuBar,
            toolbar,
            editor
        ]);


    });
</script>
