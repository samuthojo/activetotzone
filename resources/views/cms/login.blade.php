<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
    <meta charset="utf-8">

    <!-- Viewport Metatag -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Required Stylesheets -->
    <link rel="stylesheet" type="text/css" href="cms_assets/css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" type="text/css" href="cms_assets/css/fonts/ptsans/stylesheet.css" media="screen">
    <link rel="stylesheet" type="text/css" href="cms_assets/css/fonts/icomoon/style.css" media="screen">

    <link rel="stylesheet" type="text/css" href="cms_assets/css/login.css" media="screen">

    <link rel="stylesheet" type="text/css" href="cms_assets/css/mws-theme.css" media="screen">

    <title>Admin - Login Page</title>

</head>

<body>

<div id="mws-login-wrapper">
    <div id="mws-login">
        <h1>Active tots Login</h1>
        <center>
            <div style="padding: 10px; color: #a52a2a; font-size: 12px; font-weight: normal" id="alerts"></div>
        </center>
        <div class="mws-login-lock"><i class="icon-lock"></i></div>
        <div id="mws-login-form">
            <form class="mws-form" id="login_form" name="login_form">
                <div class="mws-form-row">
                    <div class="mws-form-item">
                        <input type="text" id="username" name="username" class="mws-login-username required" placeholder="username">
                    </div>
                </div>
                <div class="mws-form-row">
                    <div class="mws-form-item">
                        <input type="password" id="password" name="password" class="mws-login-password required" placeholder="password">
                    </div>
                </div>
                <div class="mws-form-row">
                    <input type="button" value="Login" onclick="authenticate()" class="btn btn-success mws-login-button">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript Plugins -->
<script src="cms_assets/js/jquery-3.1.0.js"></script>
<script src="cms_assets/js/libs/jquery.placeholder.min.js"></script>
<script src="cms_assets/custom-plugins/fileinput.js"></script>

<!-- jQuery-UI Dependent Scripts -->
<script src="cms_assets/jui/js/jquery-ui-effects.min.js"></script>

<!-- Plugin Scripts -->
<script src="cms_assets/plugins/validate/jquery.validate-min.js"></script>

<!-- Login Script -->
<script src="cms_assets/js/core/login.js"></script>
<script>
    function authenticate(){
        var password = $("#password").val();
        var username = $("#username").val();

        var user_data = {
            'username': username,
            'password': password
        };

        if(username == ''){
            var str="Please enter your Username";
            $( "#alerts" ).html( str );

        }else if(password == ''){
            var str="Please enter your password";
            $( "#alerts" ).html( str );
        }else{
            link = "admin/login";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: link,
                type:'post',
                dataType:'html',
                // data:{_token: '{{csrf_token()}}'},
                data:$('#login_form').serialize(),
                success:function(result){
                    $("#main_content").html(result);
                    var obj = jQuery.parseJSON(result);
                    var status = obj['success'];
                    if(status == 'success'){
                        window.location.href = "{{url('adminstart')}}";
                    }else{
                        var str="Wrong username or password";
                        $( "#alerts" ).html( str );
                    }
                }
            });
        }

    }
</script>

</body>
</html>
