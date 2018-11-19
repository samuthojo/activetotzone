<style>
    .testimonial{
        width:100%;
        min-height:550px;
        display:flex;
        align-items: center;
        background-image:url("{{url('uploads/slideshows/2.png')}}");
        background-size:cover; 
        background-attachment:fixed;    
    }
    .testimonial:after{
        content:"";
        position:absolute;
        width:100%;
        height:100%;
        z-index:1;
        background-color:rgba(0,0,0,0.55);


    }
    .testimonial h1{
        text-align:center;
        font-size:2.5em;
        width:60%;
        margin: 0 auto;
        z-index:2;
        font-weight:regular;
        color:white;


    }
    @media all and (max-width : 520px) {
            .testimonial h1 {
            
            font-size: 2em;
            width: calc(100% - 10px);
            margin: 0 auto;
        }
        .testimonial {
             min-height: 350px;
        }
}
</style>


<section class="testimonial">


<h1>"We guarantee that your child’s time here will be a stimulating, exciting and happy learning experience."</h1>



</section>