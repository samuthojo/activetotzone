<style>
.cta-banner{
        margin-bottom:50px;
        width:100%;
        height:100px;
        background-image:url("{{url('assets/images/pattern.jpg')}}");
        background-attachment:fixed;
        display:flex;
        flex-direction:row;
        justify-content:center;
        align-items:center;
        cursor:pointer;
    }
    .cta-banner h1{
        font-size:2em;
        color:white;
        margin-right:50px;
        font-family:"Qanelas regular",sans-serif;
    }
    .cta-banner a{
        padding: 20px 30px;
        border:solid 2px white;
        color:white;
        font-size:1em;
        text-transform:uppercase;
        font-family:"Qanelas bold",sans-serif;
        letter-spacing:0.125em;
        
    }
    .aboutus-container{
        width:100%;
        min-height:500px;   
        background:white;
    }
    .aboutus-container .values{
        display:flex;
        min-height:300px;
        width:100%;
        padding: 20px 15%;

    }
    .aboutus-container >h1{
        font-size:2.5em;
        text-align:center;
    }
    .aboutus-container >h2{
        font-size: 1em;
        text-align:center;
        margin-bottom:50px;
        font-weight:400;


    }
    .aboutus-container .values >div{
        background:#f5f5f5;
        margin-left:20px;
        display:flex;
        flex:1;
        flex-direction:column;
    }
    .values-image{
        width:100%;
        height:300px;
    }
    .values-desc{
        width:100%;
        padding:20px 25px;
height:calc(100% - 300px);

    }
    .values >div:first-child .values-desc{
        background:rgb(255, 189, 10);
    }
    .values >div:nth-child(2) .values-desc{
        background:rgb(240, 90, 33);
    }
    .values >div:nth-child(3) .values-desc{
        background:rgb(166, 196, 55);
    }
    .values-desc h1{
        font-family:"Qanelas bold",sans-serif;
        line-height:3;   
        font-size:1.8em;
        text-transform:uppercase;
    }
    .values-desc h2{
        font-size:1.2em;
    }
    .aboutus-container h3{
        font-size:1.3em;
        width:60%;
        text-align:center;
        margin:50px auto;
        max-width:1100px;

    }
    .growth-image{
        background-image:url("{{url('assets/images/growthactive.jpg')}}");
        background-size:cover;
        background-repeat:no-repeat;
        background-position:center;
    }
    .learning-image{
        background-image:url("{{url('assets/images/creativelearning.jpg')}}");
        background-size:cover;
        background-repeat:no-repeat;
        background-position:center;
    }
    .play-image{
        background-image:url("{{url('assets/images/playfun.jpg')}}");
        background-size:cover;
        background-repeat:no-repeat;
        background-position:center;
    }
    @media all and (max-width : 520px) {
        .aboutus-container{
            margin-top:-50px;
        }
        .cta-banner h1 {
            font-size: 1.1em;
            margin:0 10px;
         }
         .aboutus-container >h2{
             margin-bottom:0px;
         }
        .aboutus-container >h1{
            font-size:1.5em;
            margin:0 10px;
            font-family:"Qanelas bold",sans-serif;
        }
        .aboutus-container .values{
            flex-direction:column;
            padding: 50px 15px;
         
         }
         .aboutus-container .values >div{
             margin-left:0;
             margin-bottom:30px;
         }
         .aboutus-container h3{
             width:calc(100% - 20px);
             font-size:1.1em;
             margin: 20px auto;
             
         }
    }
</style>


<section class="aboutus-container">
        <div class="cta-banner">
              <h1>Searching for best preschool in Dar ? Look No More !  </h2> <a>click here to enroll Your Child</a>
        </div>
        <h1>Welcome To Active Tots Zone</h1>
        <h2>A Day Care & Preschool based in Kinyerezi,Dar Es Salaam</h2>
        <div class="values">
            <div>
                <div class="values-image play-image"></div>            
                <div class="values-desc">
                    <h1>FUN & PLAY</h1>
                    <h2>
                    "Play is a brain's favorite way of learning, It's a kid's job!"
                    </h2>
                </div>            
            </div>
            
            <div>
                <div class="values-image learning-image"></div>            
                <div class="values-desc">
                    <h1>Creative Learning</h1>
                    <h2>
                    Children do not need to be ''taught'' to learn as it comes natural to them,  and they learn from everything they do.
                    </h2>
                </div>            
            </div>
            
            <div>
                <div class="values-image growth-image"></div>            
                <div class="values-desc">
                    <h1>Noticeble Growth</h1>
                    <h2>
                    Adults have direct impact to the growth process of a child. To foster positive growth, we set a good example in our words and actions.
                    </h2>
                </div>            
            </div>
            
            
           
        </div>
        <h3>
            We strive to provide a safe and developmentally appropriate environment for preschool age children.<br/> We teach to the need of each individual child and nurture their interest. Our focus is to provide a stimulating and hands-on educational experience which promotes each child's social, emotional, physical and cognitive development.
            </h3>
</section>

<script>
    $(".cta-banner").click(function() {
        $([document.documentElement, document.body]).animate({
            scrollTop: $(".registration").offset().top
        }, 2000);
    });
    </script>
