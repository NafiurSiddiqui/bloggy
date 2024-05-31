<script src="https://cdn.tiny.cloud/1/{{ env('TINY_MCE_API') }}/tinymce/7/tinymce.min.js" referrerpolicy="origin">
</script>
<script>
    //! NEED SOCIAL MEDIA POSTS EMBEDDER

    var editor_config = {
        path_absolute: "/",
        selector: 'textarea#body',
        relative_urls: false,
        // plugins: [
        //     "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        //     "searchreplace wordcount visualblocks visualchars code fullscreen",
        //     "insertdatetime media nonbreaking save table directionality",
        //     "emoticons template paste textpattern"
        // ],
        // toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        plugins: 'code image fullscreen link anchor lists media',
        toolbar: 'undo redo | blocks |image | link | anchor | bold italic | fullscreen | alignleft aligncenter alignright | indent outdent | bullist numlist  | code | media ',
        file_picker_callback: function(callback, value, meta) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName(
                'body')[0].clientWidth;
            var y = window.innerHeight || document.documentElement.clientHeight || document
                .getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
            if (meta.filetype == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.openUrl({
                url: cmsURL,
                title: 'Filemanager',
                width: x * 0.8,
                height: y * 0.8,
                resizable: "yes",
                close_previous: "no",
                onMessage: (api, message) => {
                    callback(message.content);
                }
            });
        }
    };

    tinymce.init(editor_config);
</script>
