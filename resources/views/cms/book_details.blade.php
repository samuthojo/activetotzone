<div class="mws-panel grid_10">
    <div class="mws-panel-header">
        <span style="float: left;">Book Details</span>
        <span onclick="form_edit('book', {{$book->id}})" style="float: right;"><i class="fa fa-pencil fa-2x"></i></span>
    </div>
    <div class="mws-panel-body">
        <table id="bookTable" class="table table-striped table-hover different-color table-bordered">
          <tr>
            <th>Cover: </th>
              <td>
                <a href="{{asset('uploads/books/' . $book->book_url)}}"
                   target="_blank">
                  <img
                    class="img-rounded"
                    src="{{asset('uploads/book_covers/thumbs/' . $book->cover_image)}}"
                    alt="book cover" title="click to view" width="20%" height="auto">
                </a>
              </td>
          </tr>
          <tr>
            <th>Title: </th>
              <td>{{ $book->title }}</td>
          </tr>
          @if(!is_null($book->author))
          <tr>
            <th>Author: </th>
              <td>{{ $book->author }}</td>
          </tr>
          @endif
          @if(!is_null($book->date_published))
          <tr>
            <th>Date Published: </th>
              <td>{{ $book->date_published }}</td>
          </tr>
          @endif
          <tr>
            <th>Grade: </th>
              <td>{{ $book->grade }}</td>
          </tr>
          <tr>
            <th>Subject: </th>
              <td>{{ $book->subject }}</td>
          </tr>
          @if(!is_null($book->sub_subject))
          <tr>
            <th>Sub-Subject: </th>
              <td>{{ $book->sub_subject }}</td>
          </tr>
          @endif
          @if(!is_null($book->description))
          <tr>
            <th>Description: </th>
              <td>{{ $book->description }}</td>
          </tr>
          @endif
        </table>
    </div>
</div>
