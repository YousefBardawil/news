@extends('cms.parent');

@section('tittle' , 'role')

@section('main-tittle' , 'index role')
@section('sub-tittle' , 'Data of role')

@section('styles')

@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <a href="{{ route('roles.create') }}" type="submit" class="btn btn-success">create new role</a>


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
                <th>role_name</th>
                <th>guard_name</th>
                <th>Permission</th>
                <th>setting</th>

              </tr>
            </thead>
            <tbody>

                @foreach ( $roles as $role )

                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td class="badge bg-primary">{{ $role->guard_name }}</td>
                    <td>
                        <a href="{{ route('role.permissions.index', $role->id) }}" class="btn btn-success" >({{ $role->permissions_count }}) permission/s</a>
                    </td>

                    <td>
                        <div class="btn-group">
                          <a href="{{ route('roles.edit' , $role->id) }}" type="button" class="btn btn-info">edit</a>
                          <a href="#" onclick="confirmDelete({{ $role->id}},this)" type="button" class="btn btn-danger">Delete</a>
                        </div>
                      </td>
                  </tr>

                @endforeach

            </tbody>
          </table>
        </div>

        {{ $roles->links() }}
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>


@endsection

@section('scripts')

<script>
    function confirmDelete(id , referance){
      let url = '/cms/admin/roles/'+id;
      confirmDestroy(url , referance);

    }
</script>

@endsection

