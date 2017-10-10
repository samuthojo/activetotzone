<div class="mws-panel grid_10">
    <div class="mws-panel-body">
        <form name="edit_form" id="edit_form">
            <div class="mws-form-item" style="margin-bottom: 8px;">
                <input type="hidden" name="id" id="edit_id" value="{{$edit_details['id']}}" />
                <input style="color: #000000;" type="text" class="large" name="title" id="title" placeholder="Blog title" value="{{$edit_details['title']}}">
            </div>
            <div class="mws-form-item" style="margin-bottom: 8px;">
                <input style="color: #000000;" type="text" class="large" name="date" id="date" placeholder="Blog date e.g 1,june 2016" value="{{$edit_details['date']}}">
            </div>
            <div class="mws-form-item" style="margin-bottom: 8px;">
                <input style="color: #000000;" type="text" class="large" name="author" id="author" placeholder="Blog author" value="{{$edit_details['author']}}">
            </div>
            <textarea id="myTextarea">{{$edit_details['description']}}</textarea>
            <div class="mws-button-row" style="margin-top: 24px;">
                <button type="button" class="btn btn-success" onclick="save_changes('blog')">save</button>
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
