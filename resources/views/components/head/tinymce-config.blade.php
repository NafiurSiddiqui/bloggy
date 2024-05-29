<script src="https://cdn.tiny.cloud/1/{{ env('TINY_MCE_API') }}/tinymce/7/tinymce.min.js" referrerpolicy="origin">
</script>
<script>
    tinymce.init({
        selector: 'textarea#tinyeditor', // Replace this CSS selector to match the placeholder element for TinyMCE
        plugins: 'code image fullscreen link anchor lists media',
        toolbar: 'undo redo | blocks |image | link | anchor | bold italic | fullscreen | alignleft aligncenter alignright | indent outdent | bullist numlist  | code | media '
    });
    //! NEED SOCIAL MEDIA POSTS EMBEDDER
</script>
