<style>
    #events{
        min-height: 500px;
    }

    #upComingEvent{
        position: relative;
        padding-top: 130px;
    }

    #upComingEvent .bg{
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 340px;
        background: #999;
    }

    #upComingEvent #card{
        margin: auto;
        margin-bottom: 100px;
        max-width: 980px;
        box-shadow: 0 0 12px rgba(0,0,0,0.1);
    }

    #upComingEvent #title{
        background-color: #fff;
    }

    #upComingEvent #title .image{
        min-height: 400px;
        background: #ddd;
        background-size: cover;
        background-image: url({{asset('assets/images/playdayposter.png')}});
    }

    #upComingEvent #title .text{
        padding: 40px;
        width: 390px;
    }

    #upComingEvent #title .text h1{
        font-size: 2em;
        line-height: 1em;
        margin-bottom: 8px;
        margin-top: 8px;
        font-family: "Love Ya Like A Sister", serif;
    }

    #upComingEvent #title .text > p{
        text-align: left;
        font-size: 1.3em;
        font-family: "Qanelas Regular", sans-serif;
    }

    #upComingEvent #title .text span{
        display: block;
        font-size: 1em;
        font-family: "Qanelas light", sans-serif;
    }

    #infos{
        margin: 20px 0;
    }

    #infos p{
        text-align: left;
        margin-bottom: 12px;
    }

    #infos p i{
        margin-right: 4px;
    }

    #bookBtn{
        width: 100%;
        height: 40px;
        display: block;
        text-align: center;
        line-height: 2.5;
        margin-top: 25px;
        background: #913d88;
        color: #fff;
        font-family: "Qanelas Regular",sans-serif;
    }
</style>

<div class="mws-panel grid_10">
  <div class="mws-panel-header">
      <span style="float: left;">Event Details</span>
  </div>
    <div class="mws-panel-body">
      <div id="events">
          <div id="upComingEvent">
              <div class="bg"></div>
              <div id="card">
                  <div id="title" class="layout">
                      <div class="image flex"></div>
                      <div class="text">
                          <span>
                              EVENT
                          </span>
                          <h1>
                              {{$event->title}}
                          </h1>
                          <p>
                              Here is some more and more description to get you on your way.
                          </p>

                          <div id="infos">
                              <p>
                                  <i class="fa fa-calendar"></i>
                                  {{$event->date}}
                              </p>
                              <p>
                                  <i class="fa fa-clock-o"></i>
                                  {{$event->time}}
                              </p>
                              <p>
                                  <i class="fa fa-map-marker"></i>
                                  {{$event->location}}
                              </p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div id="description" style="position:relative;
        text-align:left; margin-top: 24px;">
          {{$event->description}}
      </div>
    </div>
  </div>
<script src="{{asset('assets/js/colorify.js')}}"></script>
<script>
    colorify({
        container: 'colorify-gradient-color',
        accuracy: 10,
        gradient: true,
        gradientDirection: 'to bottom right',
        give: {
            property: 'background',
            target: 'parent'
        }
    });
</script>
