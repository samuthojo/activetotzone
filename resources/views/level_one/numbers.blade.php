<!--
 Created by PhpStorm.
 User: graysonjulius
 Date: 19/07/2016
 Time: 7:11 PM -->

<style>
  .ipf-numbers{
      width: 100%;
      height: 100px;
      background-color: rgba(255, 255, 255, 1);
      top:-80px;
      display: table;

  }
  .ipf-numbers >div{
      height: 100%;
      float: left;
      display: table-cell;
      width: 23%;
      margin-right: 1%;
      margin-left: 1%;
      text-align: center;
      padding-top: 5px;
  }
  .ipf-numbers >div > h1{
      font-size: 2.5em;
      line-height: 1.5;
      font-family: "Qanelas Regular",sans-serif;
  }
  .ipf-numbers >div >h2{
      text-transform: uppercase;
      font-family: "Qanelas Regular",sans-serif;
      letter-spacing: 0.055em;
  }
  @media all and (max-width : 780px) {
      .ipf-numbers{
          top:0;}
  }
  @media all and (max-width : 520px) {
      .ipf-numbers{ display: none;}
  }
</style>

<section class="ipf-numbers">
    <div>
            <h1 class="brand-red-color">+500</h1>
            <h2>our students</h2>
    </div>
    <div>
            <h1 class="brand-blue-color">60</h1>
            <h2>complete classes</h2>
    </div>
    <div>
            <h1 class="brand-purple-color">+356</h1>
            <h2>programs</h2>
    </div>
    <div>
            <h1 class="brand-green-color">2</h1>
            <h2>branches</h2>
    </div>

</section>
