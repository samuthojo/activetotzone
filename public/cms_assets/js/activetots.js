function menu_links(header){
    $(".ipf-preloader").fadeIn(0);
    var link = "";
    if(header == "team"){
        link="cms/team";
    }else if(header == 'video'){
        link="cms/video";
    }else if(header == 'blog'){
        link="cms/blog";
    }else if(header == 'password'){
        link="cms/change_password";
    }
    else if(header == 'book'){
        link="cms/books";
    }
    else if(header == 'worksheet'){
        link="cms/worksheets";
    }
    else if(header == 'testimonial'){
        link="cms/testimonials";
    }
    else if(header == 'important_date'){
        link="cms/important_dates";
    }
    else if(header == 'slideshow'){
        link="cms/slideshows";
    }
    else if(header == 'event'){
        link="cms/events";
    }
    $.ajax({
        url: link,
        dataType:'html',
        success:function(result){
            $(".ipf-preloader").fadeOut(1000);
            $("#main_content").html(result);
        }
    });
}

function form_add(form_name){
    $(".ipf-preloader").fadeIn(0);
    link = "cms/form_add/"+form_name;
    $.ajax({
        url: link,
        dataType:'html',
        success:function(result){
            $(".ipf-preloader").fadeOut(1000);
            $("#main_content").html(result);
        }
    });
}

function form_save(form_name){
    var link = "cms/save_data/"+form_name;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    if(form_name == "team"){
        $(".ipf-preloader").fadeIn(0);
        var datas = new FormData($('#add_form')[0]);
        datas.append("name",$('#name').val());
        datas.append("position",$('#position').val());
        datas.append("description",$('#description').val());
        datas.append("file",$('#file').val());

        $.ajax({
            type: 'post',
            dataType: 'html',
            url:  link,
            data: datas,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (result){
                $(".ipf-preloader").fadeOut(1000);
                $("#main_content").html(result);
            }
        });
    }else if(form_name == "video"){
        $(".ipf-preloader").fadeIn(0);
        var datas = new FormData($('#add_form')[0]);
        datas.append("title",$('#title').val());
        datas.append("link",$('#link').val());
        datas.append("date",$('#date').val());
        datas.append("category",$('#category').val());
        datas.append("description",$('#description').val());
        datas.append("file",$('#file').val());

        $.ajax({
            type: 'post',
            dataType: 'html',
            url:  link,
            data: datas,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (result){
                $(".ipf-preloader").fadeOut(1000);
                $("#main_content").html(result);
            }
        });
    }else if(form_name == "blog"){
        $(".ipf-preloader").fadeIn(0);
        var datas = new FormData($('#add_form')[0]);
        tinyMCE.triggerSave();
        var file = $('#file').val();

        datas.append("file",file);
        datas.append("title",$('#title').val());
        datas.append("date",$('#date').val());
        datas.append("author",$('#author').val());
        datas.append("description",$('#myTextarea').val());

        $.ajax({
            type: 'post',
            dataType: 'html',
            url:  link,
            data: datas,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (result) {
                $(".ipf-preloader").fadeOut(1000);
                $("#main_content").html(result);
            }

        });

    }
    else if(form_name == "book"){
        $(".ipf-preloader").fadeIn(0);
        var myForm = document.getElementById('add_form');
        var datas = new FormData(myForm);

        $.ajax({
            type: 'post',
            dataType: 'html',
            url:  link,
            data: datas,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (result) {
                $(".ipf-preloader").fadeOut(1000);
                $("#main_content").html(result);
            }

        });

    }
    else if(form_name == "event"){
        $(".ipf-preloader").fadeIn(0);
        var myForm = document.getElementById('add_form');
        var datas = new FormData(myForm);

        $.ajax({
            type: 'post',
            dataType: 'html',
            url:  link,
            data: datas,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (result) {
                $(".ipf-preloader").fadeOut(1000);
                $("#main_content").html(result);
            }

        });
    }
    else if(form_name == "important_date"){
        $(".ipf-preloader").fadeIn(0);
        var myForm = document.getElementById('add_form');
        var datas = new FormData(myForm);

        $.ajax({
            type: 'post',
            dataType: 'html',
            url:  link,
            data: datas,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (result) {
                $(".ipf-preloader").fadeOut(1000);
                $("#main_content").html(result);
            }

        });
    }
    else if(form_name == "testimonial"){
        $(".ipf-preloader").fadeIn(0);
        var myForm = document.getElementById('add_form');
        var datas = new FormData(myForm);

        $.ajax({
            type: 'post',
            dataType: 'html',
            url:  link,
            data: datas,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (result) {
                $(".ipf-preloader").fadeOut(1000);
                $("#main_content").html(result);
            }

        });
    }
    else if(form_name == "worksheet"){
        $(".ipf-preloader").fadeIn(0);
        var myForm = document.getElementById('add_form');
        var datas = new FormData(myForm);

        $.ajax({
            type: 'post',
            dataType: 'html',
            url:  link,
            data: datas,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (result) {
                $(".ipf-preloader").fadeOut(1000);
                $("#main_content").html(result);
            }

        });
    }
    else if(form_name == "driver"){
        $(".ipf-preloader").fadeIn(0);
        if($('#password').val() == $('#confirm_password').val()){
            var datas = new FormData($('#add_form')[0]);
            datas.append("name",$('#name').val());
            datas.append("phone",$('#phone').val());
            datas.append("licence",$('#licence').val());
            datas.append("password",$('#password').val());

            $.ajax({
                type: 'post',
                dataType: 'html',
                url:  link,
                data: datas,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function (result){
                    $(".ipf-preloader").fadeOut(1000);
                    $("#main_content").html(result);
                }
            });
        }else{
            alert("Passwords do not match");
        }

    }else if(form_name == "vehicle"){
        $(".ipf-preloader").fadeIn(0);
            var datas = new FormData($('#add_form')[0]);
            datas.append("plate_number",$('#plate_number').val());
            datas.append("active_status",$('#active_status').val());
            datas.append("description",$('#description').val());

            $.ajax({
                type: 'post',
                dataType: 'html',
                url:  link,
                data: datas,
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success: function (result){
                    $(".ipf-preloader").fadeOut(1000);
                    $("#main_content").html(result);
                }
            });

    }
}

function show_team_image_closer(id){
    $('.closer').each(function(){
        $(this).css("display","none");
    });
    $('#image_closer'+id).css({
        "display": "block"
    });
    $('#image_closer'+id).parent().mouseout(function(){
        $('.closer').css('display','none');
    });

}

function close_team_image(id){
    if(confirm('Are You sure you want to replace this image?')){
        $('#'+id).css({
            backgroundImage:"none"
        });
        $('#'+id).html("<form id='replace_team_form' style='color: black;' name='replace_team_form'><div><input type='file' id='file' name='file' /> <button type='button' class='btn btn-small btn-info' style='float: right; margin-top: 5px; margin-right: 5px;' onclick='replace_team_image("+id+")'>upload</button></div></form>");

    }
}

function replace_team_image(id){
    form_name = "team";
    link = "cms/replace_image/"+form_name+"/"+id;
    var datas = new FormData($('#replace_team_form')[0]);
    var file = $('#file').val();

    datas.append("file",file);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'post',
        dataType: 'html',
        url:  link,
        data: datas,
        async: false,
        cache: false,
        contentType: false,
        processData: false,
        success: function (result) {
            $("#main_content").html(result);
        }

    });
}

function show_video_image_closer(id){
    $('.closer').each(function(){
        $(this).css("display","none");
    });
    $('#image_closer'+id).css({
        "display": "block"
    });
    $('#image_closer'+id).parent().mouseout(function(){
        $('.closer').css('display','none');
    });

}

function close_video_image(id){
    if(confirm('Are You sure you want to replace this image?')){
        $('#'+id).css({
            backgroundImage:"none"
        });
        $('#'+id).html("<form id='replace_video_form' style='color: black;' name='replace_video_form'><div><input type='file' id='file' name='file' /> <button type='button' class='btn btn-small btn-info' style='float: right; margin-top: 5px; margin-right: 5px;' onclick='replace_video_image("+id+")'>upload</button></div></form>");

    }
}

function replace_video_image(id){
    form_name = "video";
    link = "cms/replace_image/"+form_name+"/"+id;
    var datas = new FormData($('#replace_video_form')[0]);
    var file = $('#file').val();

    datas.append("file",file);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'post',
        dataType: 'html',
        url:  link,
        data: datas,
        async: false,
        cache: false,
        contentType: false,
        processData: false,
        success: function (result) {
            $("#main_content").html(result);
        }

    });
}

function event_details(id){
    $(".ipf-preloader").fadeIn(0);
    var link = "cms/event_details/"+id;
    $.ajax({
        url: link,
        dataType:'html',
        success:function(result){
            $(".ipf-preloader").fadeOut(1000);
            $("#main_content").html(result);
        }
    });
}

function blog_details(blog_id){
    $(".ipf-preloader").fadeIn(0);
    var link = "cms/blog_details/"+blog_id;
    $.ajax({
        url: link,
        dataType:'html',
        success:function(result){
            $(".ipf-preloader").fadeOut(1000);
            $("#main_content").html(result);
        }
    });
}

function book_details(id){
    $(".ipf-preloader").fadeIn(0);
    var link = "cms/book_details/"+id;
    $.ajax({
        url: link,
        dataType:'html',
        success:function(result){
            $(".ipf-preloader").fadeOut(1000);
            $("#main_content").html(result);
        }
    });
}

function show_blog_image_closer(id){
    $('.closer').css({
        'display': 'block'
    });

    $('.closer').parent().mouseout(function(){
        $('.closer').css('display','none');
    });

}

function close_blog_image(id){
    if(confirm('Are You sure you want to replace this image?')){
        $('.image_container').css({
            backgroundImage:"none"
        });
        $('.image_container').html("<form id='replace_blog_form' style='color: #f5f5f5;' name='replace_blog_form'><div><input type='file' id='file' name='file' /> <button type='button' class='btn btn-small btn-success' style='margin-top: 5px; margin-right: 5px;' onclick='replace_blog_image("+id+")'>upload</button> </div></form>");

    }
}

function replace_blog_image(id){
    form_name = "blog";
    link = "cms/replace_image/"+form_name+"/"+id;
    var datas = new FormData($('#replace_blog_form')[0]);
    var file = $('#file').val();

    datas.append("file",file);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type: 'post',
        dataType: 'html',
        url:  link,
        data: datas,
        async: false,
        cache: false,
        contentType: false,
        processData: false,
        success: function (result) {
            $("#main_content").html(result);
        }

    });
}

function internal_redirection(form_name,details_id){
    $(".ipf-preloader").fadeIn(0);
    var link = "cms/internal_redirection/"+form_name+"/"+details_id;
    $.ajax({
        url: link,
        dataType:'html',
        success:function(result){
            $(".ipf-preloader").fadeOut(1000);
            $("#main_content").html(result);
        }
    });
}

function form_edit(form_name, id){
    $(".ipf-preloader").fadeIn(0);
    var link = "cms/form_edit/"+form_name+"/"+id;
    $.ajax({
        url: link,
        dataType:'html',
        success:function(result){
            $(".ipf-preloader").fadeOut(1000);
            $("#main_content").html(result);
        }
    });
}

function save_changes(form_name){
    link = "cms/save_form_changes/"+form_name;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    if(form_name == "blog"){
        $(".ipf-preloader").fadeIn(0);
        var datas = new FormData($('#edit_form')[0]);
        tinyMCE.triggerSave();

        datas.append("title",$('#title').val());
        datas.append("date",$('#date').val());
        datas.append("description",$('#myTextarea').val());
        $.ajax({
            url:  link,
            type: 'post',
            dataType: 'html',
            data: datas,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (result) {
                $(".ipf-preloader").fadeOut(1000);
                $("#main_content").html(result);
            }

        });
    }else if (form_name == 'book' || form_name == 'event' || form_name == 'worksheet') {
      var myForm = document.getElementById('edit_form');
      var formData = new FormData(myForm);
      $.ajax({
          url: link,
          type:'post',
          dataType:'html',
          data: formData,
          async: false,
          cache: false,
          contentType: false,
          processData: false,
          success: function (result){
              $(".ipf-preloader").fadeOut(1000);
              $("#main_content").html(result);
          }
        });
    }else{
        $(".ipf-preloader").fadeIn(0);
        $.ajax({
            url: link,
            type:'post',
            dataType:'html',
            data:$('#edit_form').serialize(),
            success:function(result){
                $(".ipf-preloader").fadeOut(1000);
                $("#main_content").html(result);
            }
        });
    }

}

function form_delete(form_name,id){
    if(confirm('Are You sure you want to delete this item?')){
        $(".ipf-preloader").fadeIn(0);
        var link = "cms/form_delete/"+form_name+"/"+id;
        // var formData = new FormData();
        // formData.append('id', id);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: link,
            type:'delete',
            dataType:'html',
            success:function(result){
                $(".ipf-preloader").fadeOut(1000);
                $("#main_content").html(result);
            }
        });
    }
}

function change_password(){
    $(".ipf-preloader").fadeIn(0);
    link = "cms/change_password_form";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: link,
        type:'post',
        dataType:'html',
        data:$('#password_form').serialize(),
        success:function(result){
            $(".ipf-preloader").fadeOut(1000);
            var obj = jQuery.parseJSON(result);
            var status = obj['status'];
            $("#old_password").val("");
            $("#new_password").val("");
            $("#confirm_password").val("");
            $("#status").html(status).fadeOut(5000, function() {
                $("#status").html("").fadeIn(0);
            });
        }
    });
}
