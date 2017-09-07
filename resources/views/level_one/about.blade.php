<!--
Created by PhpStorm.
User: graysonjulius
Date: 19/07/2016
Time: 10:44 AM -->

<style>
    .ipf-about{
        width: 100%;
        min-height: 450px;
        display: table;

        background-color: whitesmoke;
        background-image: url("{{url('assets/images/schoolbg.png')}}");
    }
    .about{
        width: 60%;
        height:auto;
        display: table;
        top:-80px;
        margin: 0 auto 0;
        background: #ECF0F1;
        z-index: 9;
        padding: 10px;

    }
    .about >div{
        float: left;
        min-height: 500px;
    }
    .about .about-contents{
        width: 60%;
        padding: 10px;
    }
    .about-form{
        width: 37%;
        margin-left: 20px;
        padding: 10px;

    }
    .about-contents >h1{
        font-size: 2.5em;
        font-family: "Love light", serif;
    }
    .about-contents >h2{
        margin-top: 10px;
        font-size: 1.2em;
        font-family: "Qanelas light",sans-serif;

    }
    .about-values{
        width: 100%;
        height: auto;
        display: table;
        padding-top: 15px;

    }
    .about-values >div{
        float: left;
        width: 50%;
        height: 150px;
        margin-top: 10px;
        padding-right: 15px;

    }
    .about-values div>h1{
        font-size: 1.8em;
        font-family: "Love light", serif;

    }
    .about-form h1{
        font-size: 1.5em;
        color: white;
        text-align: center;
        font-family: "Love light", serif;
        margin-bottom: 20px;
        margin-top: 10px;
    }
    .about-form input{
        width:100%;
        height:40px;
        border: solid 1px lightgrey;
        background:#ECF0F1; ;
        outline: none;
        margin: 15px auto!important;
        padding: 5px 10px;
        font-size: 1em;
        font-family: "Qanelas light",sans-serif;
    }
    .about-form select{
        width:100%;
        height:40px;
        border: solid 1px lightgrey;
        background:#ECF0F1; ;
        outline: none;
        margin: 15px auto!important;
        font-size: 1em;
        font-family: "Qanelas light",sans-serif;

    }
    .about-form span{
        width: 100%;
        height: 40px;
        display: block;
        text-align: center;
        line-height: 2.5;
        margin-top: 20px;
        background:#FFF;
        font-family: "Qanelas Regular",sans-serif;


    }
    #feedback-error{
        top:10px;
        text-align: center;
        visibility: hidden;
    }
    @media all and (max-width : 780px) {
        .about{
            width:100%;
            top:-40px;
        }
        .about .about-contents{
            width: 100%;
        }
        .about-form{
            width: 100%;
            margin-left: 0;
        }
    }
    @media all and (max-width : 780px) {
        .about-form{
            width: 80%;
            display: block;
            margin-left: 10%;
        }
    }
    @media all and (max-width : 520px) {
        .about{
            width:100%;
            top:-40px;
        }
        .about .about-contents{
            width: 100%;
        }
        .about-form{
            width: 100%;
            margin-left: 0;
        }
    }
</style>

<section class="ipf-about">

<div class="about">
    <div class="about-contents">
        <h1>Karibu!</h1>
        <h2>At Active Tot's Zone, we strive to provide a safe and developmentally appropriate environment for preschool age children. We teach to the need of each individual child and nurture their interest. Our focus is to provide a stimulating and hands-on educational experience which promotes each child's social, emotional, physical and cognitive development.

        </h2>

        <div class="about-values">
            <div>
                <h1 class="brand-red-color">Play</h1>
                <h2>"Play is a brain's favorite way of learning, It's a kid's job!"</h2>
            </div>
            <div>
                <h1 class="brand-blue-color">Learn</h1>
                <h2>Children do not need to be ''taught'' to learn as it comes natural to them,  and they learn from everything they do.</h2>
            </div>

            <div>
                <h1 class="brand-green-color">Grow</h1>
                <h2>Adults have direct impact to the growth process of a child. To foster positive growth, we set a good example in our words and actions.</h2>
            </div>
        </div>
    </div>
    <div class="about-form brand-purple">
        <h1>Let us help you enroll your child.</h1>

         <form>
             <input type="text" placeholder="Enter Full Name" id="fullname" name="Full Name">
             <input type="text" placeholder="Enter Phone Number" id="phonenumber" name="phone">
             <input type="email" placeholder="Enter Email" id="email" name="email">
             <select id="location">
                 <option>-- Select Preffered Branch --</option>

                 <option value="Kinyerezi">Kinyerezi</option>
                 <option value="Mikocheni">Mikocheni</option>

             </select>

             <a href="javascript:sendEmail()"> <span class="ipf-button brand-purple-color">SUBMIT</span></a>
            <h2 id="feedback-error">Hello</h2>

         </form>
    </div>

</div>

</section>



<script type="text/javascript">

    function sendEmail(){

        $(".ipf-button")
            .attr('disabled','disabled');

        var username=$('#fullname');
        var email=$('#email');
        var phonenumber=$('#phonenumber');
        var location= $("#location").val();
        var subject="Hello Active TOT's";
//        var budget=$(".myform").find("input[type='radio']:checked");
        var to="samuthojo@gmail.com";
//        var to="graysonjulius@gmail.com";

        if(validateEmail($.trim(email.val()))){
            $(".ipf-button").html('<i class="fa fa-spinner" aria-hidden="true" style="line-height: 2"></i>')
            var remarkJSONObj = {
                'userName': $.trim(username.val()),
                'email': $.trim(email.val()),
                'phonenumber': $.trim(phonenumber.val()),
                'location': $.trim(location),
                'to'      : $.trim(to),
                'subject': $.trim(subject)

            };
            var url='index.php/send_email/';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type		:'POST',
                url         :url,
                data        : remarkJSONObj,
                dataType    : 'json',
                success     : function(data) {
                    $(".ipf-button").html("SUBMIT").removeAttr('disabled');;
                    $('#feedback-error')
                        .html("Thank you!<br/>For contacting us.")
                        .css({"color":"white",
                            "visibility":"visible" });


                    email.val("");
                    username.val("");
                    phonenumber.val("");
                    phonenumber.val("");
                    location.val("");


                }


            });


        }else{
            alert("Please tell us something cool.")
            $('#feedback-error')
                .html("Sorry!Message failed,<br/>Fill in all fields with correct values")
                .css({"color":"red",
                    "visibility":"visible" });
            $("#send-feedback").html('SEND')
                .removeAttr('disabled');
        }


    }
    function validateEmail(sEmail) {
        var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
        if (filter.test(sEmail)) {
            return true;
        }
        else if(sEmail==""){
            return true;
        }
        else {
            return false;
        }
    }

</script>
