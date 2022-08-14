@extends('cms.parent');

@section('tittle' , 'category')

@section('main-tittle' , 'index category')
@section('sub-tittle' , 'Data of category')

@section('styles')

@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <a href="{{ route('categories.create') }}" type="submit" class="btn btn-success">create new category</a>


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
                <th>name_of_category</th>
                <th>description</th>
                <th>created_date</th>
                <th>number_of_articles</th>
                <th>setting</th>

              </tr>
            </thead>
            <tbody>

                @foreach ( $categories as $category )

                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td class="d-flex justify-content-center "><span class="bg-secondary px-2 rounded-pill">{{ $category->articles_count }}</span></td>
                    <td>
                        <div class="btn-group">
                          <a href="{{ route('categories.edit' , $category->id) }}" type="button" class="btn btn-info">edit</a>
                          <a href="#" onclick="confirmDelete({{ $category->id}},this)" type="button" class="btn btn-danger">Delete</a>
                          <button type="button" class="btn btn-success">show</button>
                        </div>
                      </td>
                  </tr>

                @endforeach

            </tbody>
          </table>
        </div>

        {{ $categories->links() }}
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>


@endsection

@section('scripts')

<script>
    function confirmDelete(id , referance){
      let url = '/cms/admin/categories/'+id;
      confirmDestroy(url , referance);

    }
</script>

@endsection

