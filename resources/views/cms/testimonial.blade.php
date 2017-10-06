<div class="mws-panel grid_10">
    <div class="mws-panel-header">
        <span style="float: left;">Testimonials</span>
        <span onclick="form_add('testimonial')" style="float: right;">
          <i class="fa fa-plus-circle fa-2x"></i></span>
    </div>
    <div class="mws-panel-body">
        <table id="testimonialTable" class="table table-striped table-hover different-color table-bordered">
            <thead>
            <tr>
                <th scope="col">s/n. <span class="column-sorter"></span></th>
                <th scope="col">Name <span class="column-sorter"></span></th>
                <th scope="col">Relationship <span class="column-sorter"></span></th>
                <th scope="col">Words <span class="column-sorter"></span></th>
                <th scope="col">Action<span class="column-sorter"></span></th>
            </tr>
            </thead>
            <tbody>

                  @if(count($testimonials)>0)
                      @foreach($testimonials as $testimonial)
                          <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$testimonial['name']}}</td>
                            <td>{{$testimonial['relationship']}}</td>
                            <td>{{$testimonial['description']}}</td>

                          <td>
                              <div class="btn-group">
                                  <button type="button" class="btn btn-small btn-info"
                                    onclick="form_edit('testimonial', {{$testimonial['id']}})">
                                    <i class="fa fa-pencil"></i>
                                  </button>
                                  <button type="button" class="btn btn-small btn-danger"
                                    onclick="form_delete('testimonial', {{$testimonial['id']}})">
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
        $('#testimonialTable')
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
