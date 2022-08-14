@extends('cms.parent');

@section('tittle' , 'post')

@section('main-tittle' , 'index post')
@section('sub-tittle' , 'Data of post')

@section('styles')

@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <a href="{{ route('posts.create') }}" type="submit" class="btn btn-success">create new post</a>


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
                <th>post</th>
                <th>number-of-comments</th>
                <th>setting</th>

              </tr>
            </thead>
            <tbody>

                @foreach ( $posts as $post )

                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->post }}</td>
                    <td class="d-flex justify-content-center "><span class="bg-secondary px-2 rounded-pill">{{ $post->comments_count }}</span></td>


                    <td>
                        <div class="btn-group">
                          <a href="{{ route('posts.edit' , $post->id) }}" type="button" class="btn btn-info">edit</a>
                          <a href="#" onclick="confirmDelete({{ $post->id}},this)" type="button" class="btn btn-danger">Delete</a>
                          <button type="button" class="btn btn-success">show</button>
                        </div>
                      </td>
                  </tr>

                @endforeach

            </tbody>
          </table>
        </div>

        {{ $posts->links() }}
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>


@endsection

@section('scripts')

<script>
    function confirmDelete(id , referance){
      let url = '/cms/admin/posts/'+id;
      confirmDestroy(url , referance);

    }
</script>

@endsection

