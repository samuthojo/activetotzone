<div class="mws-panel grid_10">
    <div class="mws-panel-header">
        <span style="float: left;">Event Details</span>
        <span onclick="form_edit('event', {{$event->id}})"
          style="float: right; cursor:pointer;">
          <i class="fa fa-pencil fa-2x"></i></span>
    </div>
    <div class="mws-panel-body">
        <table id="eventTable" class="table table-striped table-hover different-color table-bordered">
          <tr>
            <th>Picture: </th>
              <td>
                <a href="{{asset('uploads/events/' . $event->picture)}}"
                   target="_blank">
                  <img
                    class="img-rounded"
                    src="{{asset('uploads/events/thumbs/' . $event->picture)}}"
                    alt="event picture" title="click to view" width="20%" height="auto">
                </a>
              </td>
          </tr>
          <tr>
            <th>Title: </th>
              <td>{{ $event->title }}</td>
          </tr>
          <tr>
            <th>Location: </th>
              <td>{{ $event->getLocationName() }}</td>
          </tr>
          <tr>
            <th>Date: </th>
              <td>{{Carbon\Carbon::parse($event->date)->format("j M \\'y")}}</td>
          </tr>
          <tr>
            <th>Time: </th>
              <td>{{ $event->time }}</td>
          </tr>
          <tr>
            <th>Description: </th>
              <td>{{ $event->description }}</td>
          </tr>
        </table>
    </div>
</div>
