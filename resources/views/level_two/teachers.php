<?php
/**
 * Created by PhpStorm.
 * User: graysonjulius
 * Date: 19/07/2016
 * Time: 10:16 PM
 */?>


<style>
    .ipf-teachers{
        width: 90%;
        display: table;
        margin: 0 auto 100px;

    }
    .ipf-teachers >h1{
        margin: 0 auto;
        background-position: center;
        text-align: center;
        font-size: 2em;
        font-family: "Love light", serif;
        margin-bottom: 50px;

    }
    .teacher{
        width: 40%;
        height: 255px;
        margin-right: 5%;
        margin-left: 5%;
        margin-top: 50px;
        float: left;
    }
    .teacher div>img{
        width: 100%;
        height: 255px;

    }
    .teacher >div{
        float:left;
        height:100%;
        width: 50%;
        /**/
        color: white;
    }
    .teacher >div >h1{
        padding: 10px;
        font-family: "Qanelas bold", sans-serif;
        font-size: 1.3em;
        text-transform: uppercase;
        letter-spacing: 0.125em;
    }
    .teacher >div >h2{
        font-size: 1.1em;
        padding: 10px;
    }
    @media all and (max-width : 520px) {
        .teacher{
            width: 100%;
            height: auto;
            display: table;
            margin:10px auto;
        }

        .teacher >div{
            width: 100%;
        }
    }
</style>
<section style="background: #ECF0F1;">
<div class="ipf-teachers">
    <?php
    $x = 0;
    if(count($teachers) > 0){
        foreach($teachers as $teacher){?>
    <div class="teacher">

        <div>
            <?if($x%2==0){?>
            <img src="<?=base_url("uploads/{$teacher['image']}")?>">
            <?}else{?>
            <img src="<?=base_url("uploads/{$teacher['image']}")?>">
            <?}?>
        </div>
        <div class="
         <?if($x==0){?>
         brand-green
         <?}if($x==1){?>
         brand-red
         <?}if($x==2){?>
         brand-blue
         <?}if($x==3){?>
         brand-purple
         <?}?>">

            <h1><?= $teacher['name']; ?></h1>
            <h2><?= $teacher['description']; ?></h2>
        </div>
    </div>
    <?$x++;}}?>
</div>
<section>
