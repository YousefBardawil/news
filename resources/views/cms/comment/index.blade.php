@extends('cms.parent');

@section('tittle' , 'comment')

@section('main-tittle' , 'index comment')
@section('sub-tittle' , 'Data of comment')

@section('styles')

@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <a href="{{ route('comments.create') }}" type="submit" class="btn btn-success">create new comment</a>


          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>comment</th>
                <th>post_name</th>
                <th>setting</th>

              </tr>
            </thead>
            <tbody>

                @foreach ( $comments as $comment )

                <tr>
                    <td>{{ $comment->id }}</td>
                    <td>{{ $comment->comment }}</td>
                    <td>{{ $comment->post->post }}</td>



                    <td>
                        <div class="btn-group">
                          <a href="{{ route('comments.edit' , $comment->id) }}" type="button" class="btn btn-info">edit</a>
                          <a href="#" onclick="confirmDelete({{ $comment->id}},this)" type="button" class="btn btn-danger">Delete</a>
                          <button type="button" class="btn btn-success">show</button>
                        </div>
                      </td>
                  </tr>

                @endforeach

            </tbody>
          </table>
        </div>

        {{ $comments->links() }}
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>


@endsection

@section('scripts')

<script>
    function confirmDelete(id , referance){
      let url = '/cms/admin/comments/'+id;
      confirmDestroy(url , referance);

    }
</script>

@endsection

