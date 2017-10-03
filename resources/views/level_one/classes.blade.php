<!--
 Created by PhpStorm.
 User: graysonjulius
 Date: 19/07/2016
 Time: 7:52 PM -->

<style>
    .ipf-classes{
        width: 100%;
        min-height: 500px;
        display:table;
        margin-bottom: 20px;
    }

    .ipf-classes >h1{
        margin: 0 auto;
        background-position: center;
        text-align: center;
        font-size: 2em;
        font-family: "Love light", serif;

    }
    .ipf-classes >div{

        height: auto;
        display: table;
        width: 90%;
        margin: 50px auto 0;
    }
    .room{
        width: 23%;
        height:auto;
        display: table-cell;
        background: #ECF0F1;
        float: left;
        margin-left: 2%;

    }
    .room-image{
        width: 100%;
        height: auto;
        display: table;
        background-size: contain;
    }
    .room-image img{
        width: 100%;

    }
    .room >h1{
        text-align: center;
        font-size: 1.6em;
        line-height: 3;
        font-family: "Qanelas Regular", sans-serif;
        border-bottom: solid 1px lightgrey;
        width: 90%;
        margin: 0 auto;
        text-transform: capitalize;
        letter-spacing: 0.025em;

    }
    .room-footer{
        height: auto;
        width: 90%;
        padding: 15px 15px;
        display: table;
        margin: 0 auto;

    }
    .room-footer >div{
        float: left;
        width: 50%;
        height: auto;
    }
    .room-footer div >h1{
        font-family: "Qanelas bold", sans-serif;
        font-size: 0.9em;
        color: #666;
        text-align: center;
    }
    .room-footer div >h2{
        font-family: "Qanelas Regular", sans-serif;
        font-size: 2em;
        line-height: 1.5;
        text-align: center;
    }
    @media all and (max-width : 780px) {
        .room{
            width: 40%;
            margin: 20px!important;
            display: block;
            float: left;
        }
    }

    @media all and (max-width : 520px) {
        .ipf-classes >div{
            width: 100%;
        }
        .room{
            width: 90%;
            margin: 20px auto!important;
            display: block;
            float: none;
        }
    }
</style>

<section class="ipf-classes">

    <h1 class="brand-blue-color">Our Classes</h1>

    <div>

        <div class="room">
            <div class="room-image">

                <img src="<?=url('assets/images/class1.jpg')?>" alt="Active TOTS Image">

            </div>

            <h1 class="brand-blue-color">Beetles Class</h1>
            <div class="room-footer">
                <div>
                    <h1>AGE</h1>
                    <h2 class="brand-blue-color">2</h2>
                </div>
                <div>
                    <h1 >CLASS SIZE</h1>
                    <h2 class="brand-blue-color">18</h2>
                </div>
            </div>
        </div>
        <div class="room">
            <div class="room-image">

                <img src="<?=url('assets/images/class2.jpg')?>" alt="Active TOTS Image">

            </div>

            <h1 class="brand-red-color">ladybug Class</h1>
            <div class="room-footer">
                <div>
                    <h1>AGE</h1>
                    <h2 class="brand-red-color">3</h2>
                </div>
                <div>
                    <h1 >CLASS SIZE</h1>
                    <h2 class="brand-red-color">15</h2>
                </div>
            </div>
        </div>

        <div class="room">
            <div class="room-image">

                <img src="<?=url('assets/images/class3.jpg')?>" alt="Active TOTS Image">

            </div>
            <h1 class="brand-green-color">butterfly Class</h1>
            <div class="room-footer">
                <div>
                    <h1>AGE</h1>
                    <h2 class="brand-green-color">4</h2>
                </div>
                <div>
                    <h1 >CLASS SIZE</h1>
                    <h2 class="brand-green-color">20</h2>
                </div>
            </div>
        </div>
        <div class="room">
            <div class="room-image">

                <img src="<?=url('assets/images/class4.jpg')?>" alt="Active TOTS Image">

            </div>

            <h1 class="brand-purple-color">busy bee Class</h1>
            <div class="room-footer">
                <div>
                    <h1>AGE</h1>
                    <h2 class="brand-purple-color">5</h2>
                </div>
                <div>
                    <h1 >CLASS SIZE</h1>
                    <h2 class="brand-purple-color">19</h2>
                </div>
            </div>

        </div>

    </div>

</section>
