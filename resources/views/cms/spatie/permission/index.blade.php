@extends('cms.parent');

@section('tittle' , 'permission')

@section('main-tittle' , 'index permission')
@section('sub-tittle' , 'Data of permission')

@section('styles')

@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <a href="{{ route('permissions.create') }}" type="submit" class="btn btn-success">create new permission</a>


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
                <th>permission_name</th>
                <th>guard_name</th>
                <th>setting</th>

              </tr>
            </thead>
            <tbody>

                @foreach ( $permissions as $permission )

                <tr>
                    <td>{{ $permission->id }}</td>
                    <td>{{ $permission->name }}</td>
                    <td>{{ $permission->guard_name }}</td>

                    <td>
                        <div class="btn-group">
                          <a href="{{ route('permissions.edit' , $permission->id) }}" type="button" class="btn btn-info">edit</a>
                          <a href="#" onclick="confirmDelete({{ $permission->id}},this)" type="button" class="btn btn-danger">Delete</a>
                        </div>
                      </td>
                  </tr>

                @endforeach

            </tbody>
          </table>
        </div>

        {{ $permissions->links() }}
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>


@endsection

@section('scripts')

<script>
    function confirmDelete(id , referance){
      let url = '/cms/admin/permissions/'+id;
      confirmDestroy(url , referance);

    }
</script>

@endsection

