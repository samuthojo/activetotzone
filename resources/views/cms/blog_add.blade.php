<div class="mws-panel grid_10">
    <div class="mws-panel-header">
        <span style="float: left;">Blogs</span>
        <span onclick="form_add('blog')" style="float: right;"><i class="fa fa-plus-circle fa-2x"></i></span>
    </div>
    <div class="mws-panel-body">
        <form name="add_form" id="add_form">
            <div class="mws-form-item" style="margin-bottom: 8px;">
                <input style="color: #000000;" type="text" class="large" name="title" id="title" placeholder="Blog title">
            </div>
            <div class="mws-form-item" style="margin-bottom: 8px;">
                <input style="color: #000000;" type="text" class="large" name="date" id="date" placeholder="Blog date e.g 1,june 2016">
            </div>
            <div class="mws-form-item" style="margin-bottom: 8px;">
                <input style="color: #000000;" type="text" class="large" name="author" id="author" placeholder="Blog author">
            </div>
            <div class="mws-form-item" style="margin-bottom: 8px;">
                <label for="file">Choose image</label><br>
                <input type="file" name="file" id="file">
            </div>
            <textarea id="myTextarea"></textarea>
            <div class="mws-button-row" style="margin-top: 24px;">
                <button type="button" class="btn btn-success" onclick="form_save('blog')">save</button>
                <button type="button" class="btn btn-danger" onclick="menu_links('blog')">cancel</button>
            </div>
        </form>
    </div>
</div>
<script src="tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
    tinymce.init({
        selector: '#myTextarea',
        height: 300,
        theme: 'modern',
        fontsize_formats: "8pt 9pt 10pt 11pt 12pt 26pt 36pt",
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools'
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor emoticons| sizeselect | fontselect |  fontsizeselect '

    });
</script>