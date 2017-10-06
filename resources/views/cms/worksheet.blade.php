<div class="mws-panel grid_10">
    <div class="mws-panel-header">
        <span style="float: left;">Worksheets</span>
        <span onclick="form_add('worksheet')" style="float: right;">
          <i class="fa fa-plus-circle fa-2x"></i></span>
    </div>
    <div class="mws-panel-body">
        <table id="workSheetTable" class="table table-striped table-hover different-color table-bordered">
            <thead>
            <tr>
                <th scope="col">s/n. <span class="column-sorter"></span></th>
                <th scope="col">Type <span class="column-sorter"></span></th>
                <th scope="col">Action <span class="column-sorter"></span></th>
            </tr>
            </thead>
            <tbody>

                  @if(count($worksheets)>0)
                      @foreach($worksheets as $worksheet)
                          <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$worksheet['type']}}</td>

                          <td>
                              <div class="btn-group">
                                  <button type="button" class="btn btn-small btn-info"
                                    onclick="form_edit('worksheet', {{$worksheet['id']}})">
                                    <i class="fa fa-info"></i>
                                  </button>
                                  <button type="button" class="btn btn-small btn-danger"
                                    onclick="form_delete('worksheet', {{$worksheet['id']}})">
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
        $('#workSheetTable')
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
