<script src="https://cdn.tiny.cloud/1/{{ env('TINY_MCE_API') }}/tinymce/7/tinymce.min.js" referrerpolicy="origin">
</script>
<script>
    tinymce.init({
        selector: 'textarea#tinyeditor', // Replace this CSS selector to match the placeholder element for TinyMCE
        plugins: 'code table lists',
        toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
    });
</script>
