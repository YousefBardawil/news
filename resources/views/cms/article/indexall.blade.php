@extends('cms.parent');

@section('tittle' , 'article')

@section('main-tittle' , 'index article')
@section('sub-tittle' , 'Data of article')

@section('styles')

@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">


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
                <th>title_of_article</th>
                <th>short_description</th>
                <th>full_description</th>
                <th>category</th>
                <th>author</th>
                <th>created_date</th>

              </tr>
            </thead>
            <tbody>

                @foreach ( $articles as $article )

                <tr>
                    <td>{{ $article->id }}</td>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->short_description }}</td>
                    <td>{{ $article->full_description }}</td>
                    <td>{{ $article->category->name }}</td>
                    <td>{{ $article->author->user->first_name }}</td>
                    <td>{{ $article->created_at }}</td>
                    {{-- <td>
                        <div class="btn-group">
                          <a href="{{ route('articles.edit' , $article->id) }}" type="button" class="btn btn-info">edit</a>
                          <a href="#" onclick="confirmDelete({{ $article->id}},this)" type="button" class="btn btn-danger">Delete</a>
                          <button type="button" class="btn btn-success">show</button>
                        </div>
                      </td> --}}
                  </tr>

                @endforeach

            </tbody>
          </table>
        </div>

        {{ $articles->links() }}
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>


@endsection

@section('scripts')

{{-- <script>
    function confirmDelete(id , referance){
      let url = '/cms/admin/articles/'+id;
      confirmDestroy(url , referance);

    }
</script> --}}

@endsection

