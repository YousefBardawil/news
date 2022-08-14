@extends('cms.parent');

@section('tittle' , 'admin')

@section('main-tittle' , 'index admin')
@section('sub-tittle' , 'Data of admin')

@section('styles')

@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <a href="{{ route('admins.create') }}" type="submit" class="btn btn-success">create new admin</a>


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
                <th>last_name</th>
                <th>mobile</th>
                <th>email</th>
                <th>Gender</th>
                <th>status</th>
                <th>image</th>
                <th>settings</th>

              </tr>
            </thead>
            <tbody>

                @foreach ( $admins as $admin )

                <tr>
                    <td>{{ $admin->id }}</td>
                    <td>{{ $admin->user['first_name'] }}</td>
                    <td>{{ $admin->user['last_name']}}</td>
                    <td>{{ $admin->user['mobile']}}</td>
                    <td>{{ $admin->email }}</td>
                    <td>{{ $admin->user['gender'] }}</td>
                    <td>{{ $admin->user['status']}}</td>
                    <td>{{ $admin->user['img'] }}</td>

                    <td>
                        <div class="btn-group">
                          <a href="{{ route('admins.edit' , $admin->id) }}" type="button" class="btn btn-info">edit</a>
                          <a href="#" onclick="confirmDelete({{ $admin->id}},this)" type="button" class="btn btn-danger">Delete</a>
                          <button type="button" class="btn btn-success">show</button>
                        </div>
                      </td>
                  </tr>

                @endforeach

            </tbody>
          </table>
        </div>



        {{ $admins->links() }}
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>


@endsection

@section('scripts')

<script>
    function confirmDelete(id , referance){
      let url = '/cms/admin/admins/'+id;
      confirmDestroy(url , referance);

    }
</script>

@endsection

