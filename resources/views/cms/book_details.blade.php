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
          <tr>
            <th>Author: </th>
              <td>{{ $book->author }}</td>
          </tr>
          <tr>
            <th>Date Published: </th>
              <td>{{ $book->date_published }}</td>
          </tr>
          <tr>
            <th>Description: </th>
              <td>{{ $book->description }}</td>
          </tr>
        </table>
    </div>
</div>
