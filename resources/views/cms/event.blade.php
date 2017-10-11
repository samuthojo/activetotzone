<div class="mws-panel grid_10">
    <div class="mws-panel-header">
        <span style="float: left;">Events</span>
        <span onclick="form_add('event')" style="float: right;"><i class="fa fa-plus-circle fa-2x"></i></span>
    </div>
    <div class="mws-panel-body">
        <table id="eventTable" class="table table-striped table-hover different-color table-bordered">
            <thead>
            <tr>
                <th scope="col">s/n. <span class="column-sorter"></span></th>
                <th scope="col">Title <span class="column-sorter"></span></th>
                <th scope="col">Date <span class="column-sorter"></span></th>
                <th scope="col">Location <span class="column-sorter"></span></th>
                <th scope="col">Action<span class="column-sorter"></span></th>
            </tr>
            </thead>
            <tbody>

                  @if(count($events)>0)
                      @foreach($events as $event)
                          <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$event['title']}}</td>
                            <td>{{Carbon\Carbon::parse($event['date'])->format("j M \\'y")}}</td>
                            <td>{{$event->getLocationName()}}</td>

                          <td>
                              <div class="btn-group">
                                  <button type="button" class="btn btn-small btn-info"
                                    onclick="event_details({{$event['id']}})">
                                    <i class="fa fa-info"></i>
                                  </button>
                                  <button type="button" class="btn btn-small btn-warning"
                                          onclick="form_edit('event', {{$event['id']}})">
                                      <i class="fa fa-pencil"></i>
                                  </button>
                                  <button type="button" class="btn btn-small btn-danger"
                                    onclick="form_delete('event', {{$event['id']}})">
                                    <i class="fa fa-trash"></i>
                                  </button>
                              </div>
                          </td>
                          </tr>
                      @endforeach
      	          @endif
                  </tbody>
              </table>
          </div>
      </div>
<script>
    $(document).ready(function () {
        $('#eventTable')
            .dataTable({
                iDisplayLength: 8,
                oLanguage: {
                    sSearch: 'search:',
                    sZeroRecords: 'No  results found ',
                    oPaginate: {
                        sNext: '<i class="fa fa-arrow-right"></i>',
                        sPrevious: '<i class="fa fa-arrow-left"></i>'
                    }
                },
                bLengthChange: false,
                sDom: "<'row-fluid' <'span4'l> <'span8'f> > rt <'row-fluid' <'span12'p> >"
            });
        $('#exampleDT_length select').select2({
            minimumResultsForSearch: 6,
            width: "off"
        });

    });
</script>
