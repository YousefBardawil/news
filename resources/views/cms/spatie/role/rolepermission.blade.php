@extends('cms.parent');

@section('tittle' , 'permissions')

@section('main-tittle' , 'permission')
@section('sub-tittle' , 'permission')

@section('styles')

@endsection



@section('content')

<div class="card card-primary">
    <div class="card-header">
        <a href="{{ route('permissions.index') }}" type="submit" class="btn btn-success">permission</a>

      <h3 class="card-title"> </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
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
                         <div class="icheck-primary d-inline">
                            <input type="checkbox" id="permission_{{ $permission->id }}"
                             onchange="storeRolePermission({{$roleId}},{{$permission->id}})" @if($permission->active) checked @endif>
                             <label for="permission_{{$permission->id}}"></label>
                         </div>
                        </td>
                    </tr>

                  @endforeach

              </tbody>
            </table>
          </div>

      <!-- /.card-body -->
    </form>
  </div>

@endsection

@section('scripts')

<script>

  function storeRolePermission(roleId, permissionId){
    let data = {
        permission_id: permissionId,
    };

    store('/cms/admin/role/'+roleId+'/permissions',data);

  }

</script>

@endsection





