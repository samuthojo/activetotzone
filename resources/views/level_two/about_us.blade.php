@extends('layouts.app')
@section('title', $title)
@section('content')
<style>
    .ipf-about-us{
        width: 100%;
        display: table;
        /*min-height: 80vh;*/
        background: #ECF0F1;
        padding: 60px 0;

    }
    .ipf-about-us >h1{
        font-family: "Love light", serif;
        font-size: 3.5em;
        text-align: center;
    }
    .ipf-about-us >h2{
        font-size: 3em;
        width: 50%;
        margin: 20px auto;
        text-align: center;

    }
    .first-row,.second-row{
        width: 80%;
        height:auto;
        display: table;
        margin: 50px auto;
    }
    .first-row >div{
        width: 50%;
        float: left;
        padding: 20px;
        font-size: 1.3em;
        text-align: justify;
    }
    .first-row >div:first-child{
        padding-right: 50px;
    }
    .first-row >div:last-child{
        padding-left: 50px;
    }
    .banner{
        width: 100%;
        height: 500px;
        /*background-size: cover;*/
        background-position: center;
        background-repeat: no-repeat;
        background-color: white;
        background-image: url("{{url('assets/images/activetotsbanner2.jpg')}}");
    }

    .second-row >div{
        width: 30.3333%;
        height: auto;
        display: table;
        float: left;
        margin-right: 1.5%;
        margin-left: 1.5%;
        padding-right: 50px;
    }
    .second-row >div h1{
        font-size: 1.2em;
        font-family: "Qanelas bold",sans-serif;
        line-height: 2;
        text-transform: uppercase;

    }
    .second-row >div >h2{
        text-align: justify;
        font-size: 1.2em;
    }
    @media all and (max-width : 780px) {
        .ipf-about-us{
            top:-40px;
        }
        .first-row >div{
            width: 100%;
            float: none;
            text-align: left;
            padding: 5px;
        }
        .first-row >div:first-child{
            padding-right: 0;
        }
        .first-row >div:last-child{
            padding-left: 0;
        }
    }

    @media all and (max-width : 520px) {
        .ipf-about-us >h1{
            font-size: 2.5em;
        }
        .ipf-about-us >h2{
            width: 90%;
            font-size: 1.5em;
        }
        .ipf-about-us{
            top:-50px;

        }
        .first-row,.second-row{
            width: 95%;
        }
        .first-row >div{
            width: 100%;
            float: none;
            text-align: left;
            padding: 5px;
        }
        .first-row >div:first-child{
            padding-right: 0;
        }
        .first-row >div:last-child{
            padding-left: 0;
        }
        .second-row >div{
            width: 100%;
        }
    }
</style>

<section class="ipf-about-us">
    <h1>About Us </h1>
    <h2>"We guarantee that your child’s time here will be a stimulating, exciting and happy learning experience."</h2>
    <div class="first-row">
        <div>
            Active Tot's Zone is founded on the principle that within every child there is the potential for learning that is virtually unlimited.  The teaching/learning process is directed toward helping our children become aware of their potential and developing a love of learning that will carry them through their lifetime.
            At Active Tot's Zone your child's safety is our first priority. We begin at the front doors! Our building are secure and equipped with surveillance equipments to ensure safety of our children at all time. All classrooms are designed with safety in mind. Our playgrounds meet stringent safety requirements.
            We strongly believe that education is a shared responsibility. We thus make extraordinary effort to keep parents informed of their child’s progress and development, as well as day-to-day classroom activities. Parent involvement is encouraged and expected. Diversity in all families is valued and celebrated.
            Children are taught to think creatively, to solve problems, and to experience the joy of learning.  The children are encouraged to find a variety of alternatives to solve problems, to view mistakes as opportunities for learning, and to regard learning as a joyful and life-long experience.

        </div>
        <div>
            Teachers hold high expectations in academic and social achievement.  Since learning is enhanced by optimum mental, physical, and emotional health, children are taught from the beginning, the importance of a healthy balance of nutrition, exercise, rest, work and play.  In addition to academic areas of learning, Active Tot's Zone will also emphasize the arts, physical education; a peaceful means of relating to others, and culturally accepted values.
            Active Tot's Zone is committed to the development of self-responsibility, responsibility not only for one’s actions or behavior, but also for the feelings and emotions of others.  Children are taught to respect themselves and their classmates.
            A highly qualified and creative staff, as well as educational consultants, selects the curriculum, methods, techniques, and tools. This include the following:
        </div>
    </div>
    <div class="banner"></div>
    <div class="second-row">
        <div>
            <h1>our mission</h1>
            <h2>At Active Tot's Zone, we strive to provide a safe and developmentally appropriate environment for preschool age children. We teach to the need of each individual child and nurture their interest. Our focus is to provide a stimulating and hands-on educational experience which promotes each child's social, emotional, physical and cognitive development</h2>
        </div>

        <div>
            <h1>our vision</h1>
            <h2>We aim at inspiring young minds, build confident adults, support life-long learning and promote positive relationship among children.</h2>
        </div>

        <div>
            <h1>Our Philosophy</h1>
            <h2>Each child is unique in their own special way with their special qualities.  Active Tot’s zone aim at nurturing those qualities, and provide them with the opportunity to develop physically, cognitively, socially and emotionally. We believe that play is the most important aspect of a child life. It is essential to their wellbeing and development.</h2>
        </div>

    </div>

<!--    <h1>Our Teachers </h1>-->
<!--    <h2>The dream begins with a teacher who believes in your child.</h2>-->



</section>
@endsection
