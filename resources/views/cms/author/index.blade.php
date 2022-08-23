@extends('cms.parent');

@section('tittle' , 'author')

@section('main-tittle' , 'index author')
@section('sub-tittle' , 'Data of author')

@section('styles')

@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <a href="{{ route('authors.create') }}" type="submit" class="btn btn-success">create new author</a>


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
                <th>first_name</th>
                <th>Gender</th>
                <th>status</th>
                <th>image</th>
                <th>article</th>
                <th>settings</th>

              </tr>
            </thead>
            <tbody>

                @foreach ( $authors as $author )

                <tr>
                    <td>{{ $author->id }}</td>
                    <td>{{ $author->user->first_name }}</td>
                    <td>{{ $author->user->gender }}</td>
                    <td>{{ $author->user->status}}</td>
                    <td>
                        <img class="img-circle img-bordered-sm" src="{{ asset('images/author/'. $author->user->image)  }}" width="50" alt="">
                    </td>
                    <td><a href="{{route('indexArticle',['id'=>$author->id])}}"
                        class="btn btn-info">({{$author->articles_count}})
                        article/s</a> </td>

                    <td>
                        <div class="btn-group">
                          <a href="{{ route('authors.edit' , $author->id) }}" type="button" class="btn btn-info">edit</a>
                          <a href="#" onclick="confirmDelete({{ $author->id}},this)" type="button" class="btn btn-danger">Delete</a>
                          <a href="{{ route('authors.show' , $author->id) }}" type="button" class="btn btn-success">show</a>
                        </div>
                      </td>
                  </tr>

                @endforeach

            </tbody>
          </table>
        </div>



        {{ $authors->links() }}
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>


@endsection

@section('scripts')

<script>
    function confirmDelete(id , referance){
      let url = '/cms/admin/authors/'+id;
      confirmDestroy(url , referance);

    }
</script>

@endsection

