<style>
    .ipf-testimonials{
        width: 100%;
        display:table;
        margin-bottom: 80px;
        padding: 20px 0;
    }

    .ipf-testimonials > h1{
        margin: 0 auto;
        background-position: center;
        text-align: center;
        font-size: 1.1em;
        text-transform: uppercase;
        font-family: "Qanelas", serif;
        color: #1bbc9b !important;
        border-bottom: 1px solid #1bbc9b;
        display: inline-block;
        padding: 0 12px;
        padding-bottom: 8px;
    }

    p{
        font-family: "Qanelas", serif;
    }

    #landingTestimonials button{
        /*position: absolute;*/
        /*top: 0;*/
        /*bottom: 0;*/
        background: none;
        border: none;
        width: 40px;
        height: 40px;
        text-align: center;
    }

    #landingTestimonials button[disabled]{
        opacity: 0.5;
        pointer-events: none;
    }

    #testimonialList{
        margin-left: 12px;
        margin-right: 12px;
        max-width: 800px;
        /*min-height: 400px;*/
        overflow: hidden;
    }

    #testimonialScroller{
        /*transform: translateX(-100%);*/
        transition: transform 0.25s ease-out;
    }

    .button-holder{
        padding:0 12px;
        background-color: #fff;
        z-index: 1;
    }

    .button-holder i{
        font-size: 2em;
    }

    .testimonial{
        min-width: 100%;
        margin: auto;
        margin-top: 20px;
        text-align: center;
    }

    #landingTestimonials .testimonial:not(.active){
        opacity: 0;
    }

    .testimonial h3{
        font-family: "Qanelas", serif;
        font-size: 18px;
        margin-top: 8px;
    }

    .testimonial h3 span{
        color: #888;
    }

    .testimonial p{
        font-family: "Qanelas Light", serif;
        font-size: 20px;
        line-height: 1.6em;
    }

    @media all and (max-width : 768px) {
        #landingTestimonials {
            display: block;
            margin-bottom: 12px;
        }

        .button-holder{
            padding: 0 2px !important;
        }

        #landingTestimonials button{
            width: 30px;
            height: 30px;
        }

        #testimonialList{
            margin-top: 5px;
            margin-left:0;
            margin-right: 0;
        }

        .testimonial p {
            font-size: 16px;
        }

        .ipf-blog {
            padding: 20px;
            /*width: calc(100vw - 60px) !important;*/
        }

        .blog {
            width: calc(100vw - 35px) !important;
        }
    }
</style>

<section id="landingTestimonials" class="ipf-testimonials" style="text-align: center;">
    <h1 class="brand-blue-color">What Our parents say</h1>

    <div style="max-width: 1000px; margin: auto;">
        <div class="layout justified">
            <div class="button-holder layout center">
                <button disabled class="testimonial-mover" onclick="moveTestimonials(0)"><i class="fa fa-chevron-left"></i></button>
            </div>
            <div id="testimonialList" class="flex">
                <div id="testimonialScroller" class="layout center">
                    <div class="testimonial active">
                        <p>
                            Active tots zone is a solution for  busy parents; you can leave your child without any worry.
                            They take superb care of the children, I like this school so much, I invite all parents
                            who are looking for better school for their children to bring their children here.
                        </p>
                        <h3>Tusa Mahava</h3>
                    </div>

                    <div class="testimonial">
                        <p>
                            ACTIVE TOT'S  ZONE the best School in TOWN..Beautiful environment for the  Children to Learn.
                            Dear Parents  don't Miss this Opportunity for better Future of your  Children.
                        </p>
                        <h3>Neema Swai</h3>
                    </div>

                    <div class="testimonial">
                        <p>
                            I would recommend activetotzone to dar parents because its a good school for little kids
                            due to its learning environment as well as teaching equipments. Kids do learn, plan and
                            have fun as well. Activetotzone its your rights choice for your kid.
                        </p>
                        <h3>Zuwena Shame</h3>
                    </div>
                </div>
            </div>
            <div class="button-holder layout center">
                <button disable class="testimonial-mover" onclick="moveTestimonials(1)"><i class="fa fa-chevron-right"></i></button>
            </div>
        </div>
    </div>
</section>

<script>
    var testimonials = document.querySelectorAll('.testimonial');
    var movers = document.querySelectorAll('.testimonial-mover');
    var mult = undefined, count = testimonials.length - 1, curidx = 0;

    function moveTestimonials(direction) {
        mult = undefined;

        if(direction && (curidx < count))
            mult = 1;
        else if(!direction && (curidx > 0))
            mult = -1;

        if(mult !== undefined){
            testimonials[curidx].classList.remove("active");
            curidx += mult;
            var trans = parseInt(curidx * -100) + "%";
            document.getElementById("testimonialScroller").style.transform = "translateX("+trans+")";

            setTimeout(function () {
                testimonials[curidx].classList.add("active");
            }, 200);

            setButtons();
        }
    }

    function setButtons() {
        if(curidx < count)
            movers[1].removeAttribute('disabled');
        else
            movers[1].setAttribute('disabled', 'disabled');

        if(curidx > 0)
            movers[0].removeAttribute('disabled');
        else
            movers[0].setAttribute('disabled', 'disabled');
    }
</script>
