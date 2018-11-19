<style>

    .registration{
        width:100%;
        
        background-image: url("{{url('assets/images/black-Linen.png')}}");

        background-attachment:fixed;
        margin-top:150px;
        display:flex;
        flex-direction:column;


        
    }
    .about-form{
        width: 37%;
        padding: 3px;
        margin:30px auto 100px;
        background-color:white;
    }
    
    .registration > h1{
        
        color: white;
        font-size: 2.8em;
        font-family: "Qanelas bold",sans-serif;
        margin-bottom: 10px;
        margin-top: 50px;
        text-transform:uppercase;
        text-align:center;
    }
    .registration > h2{
        font-size: 1em;
        text-align: center;
        margin-bottom: 20px;
        font-weight: 400;
        color:white;
    }
    .about-form input{
        width:100%;
        height:60px;
        border: solid 1px #000;
        background:#ECF0F1; ;
        outline: none;
        padding: 5px 10px;
        font-size: 1em;
        font-family: "Qanelas light",sans-serif;
        border-bottom:none;
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
        display: block;
        text-align: center;
        /* margin-top: 20px; */
        background:#000;
        padding:26px 0 ;
        font-family: "Qanelas Regular",sans-serif;
        color:#FFF;
    }
    #feedback-error{
        top:10px;
        text-align: center;
        display:none;

    }
    @media all and (max-width : 520px) {
        .about-form{
            width: 90%;
        }
        .registration > h1 {
         font-size: 2em;
         }
    }
</style>


<section class="registration">

<h1 >Pre Register your child</h1>
<h2>We will do the heavy lifting for you, all you need is to contact us.</h2>

 <div class="about-form ">
        

         <form>
             <input type="text" placeholder="Enter Full Name" id="fullname" name="Full Name">
             <input type="text" placeholder="Enter Phone Number" id="phonenumber" name="phone">
             <input type="email" placeholder="Enter Email" id="email" name="email">
             <!-- <select id="location">
                 <option>-- Select Preffered Branch --</option>

                 <option value="Kinyerezi">Kinyerezi</option>
                 <option value="Mikocheni">Mikocheni</option>

             </select> -->

             <a href="javascript:sendEmail()"> <span class="ipf-button">SUBMIT</span></a>
            <h2 id="feedback-error">Hello</h2>

         </form>
    </div>

</section>



<script type="text/javascript">
    function sendEmail(){
        $(".ipf-button")
            .attr('disabled','disabled');
        var username=$('#fullname');
        var email=$('#email');
        var phonenumber=$('#phonenumber');
        var location= 'Kinyerezi';
        var subject="Hello Active TOT's";
//        var budget=$(".myform").find("input[type='radio']:checked");
       {{--var to="graysonjulius@gmail.com";--}}
       var to="info@activetotzone.com";
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
            var url='send_email';
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
                    // location.val("");
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