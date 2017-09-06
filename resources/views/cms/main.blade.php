@extends('layouts.admin')
@section('content')
<!-- Main Container Start -->
<div id="mws-container" class="clearfix">

    <!-- Inner Container Start -->
    <div class="container" id="main_content">
        <div class="mws-panel grid_10">
            <div class="mws-panel-header">
                <span style="float: left;">Our team</span>
                <span onclick="form_add('team')" style="float: right;"><i class="fa fa-plus-circle fa-2x"></i></span>
            </div>
            <div class="mws-panel-body">
              @if(count($team)>0)
                  @foreach($team as $details)
             	@php
             		$id = 'image_closer'.$details['id'];
             	@endphp
             	<section id="team_details" style="height: 300px; width: 100%; padding-top: 10px;">
             		<div id="{{$details['id']}}" onmouseover="show_team_image_closer(id)" id="farmer_image" style="position: relative; border: 			solid 3px #d3d3d3; float: left; width: 40%; height: 300px; background-image: url('{{url("uploads/" . $details['image'])}}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
             		<i id="{{$id}}" onclick="close_team_image({{$details['id']}})" class="fa fa-times fa-2x closer" style="color: darkred; display: 		block; position: absolute; left: 45%; bottom: 45%; cursor: pointer;"></i>
             		</div>
             		<div id="team_description" style="border: solid 3px #d3d3d3; float: left; margin-left: 0; height: 300px; width: 40%; position: 			relative;">
                                             <div style="padding: 10px;">
                                                 <span style="padding-left: 10px;"><b>{{$details['name']}}</b></span><br>
                                                 <span style="padding-left: 10px;"><b>{{$details['position']}}</b></span><br><br>
                                                 <p style="padding-left: 10px;">{{$details['description']}}</p>
                                             </div><br>
                                             <div class="btn-group" style="position: absolute; bottom: 0; padding-left: 10px;" >
                                                 <button class="btn btn-primary btn-flat" onclick="form_edit('team',{{$details['id']}})">Edit</button>
                                                 <button class="btn btn-success btn-flat" onclick="form_delete('team',{{$details['id']}})">Delete</button>
                                             </div>
                                         </div>
                                     </section>
                                 @endforeach
                                 @endif
                         </div>
                     </div>
                   </div>
                   <!-- Inner Container End -->

                   <!-- Footer -->
                   <div id="mws-footer">
                       <strong>Copyright &copy; {{date("Y")}} <a style="color: #00008b !important;" href="http://ipfsoftwares.com">Designed & developed by iPF</a>.</strong> All rights reserved.
                   </div>

                   </div>
                   <!-- Main Container End -->

                   </div>

                   <div class="ipf-preloader" >
                   <span><i class="fa fa-circle-o-notch fa-spin fa-2x" style="color: #ffffff;"></i></span><br/><br/><br/>
                   </div>
                   </body>
                   </html>                 
@endsection
