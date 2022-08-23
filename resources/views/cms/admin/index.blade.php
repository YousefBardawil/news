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
            {{-- <a href="{{ route('admins.create') }}" type="submit" class="btn btn-success">create new admin</a> --}}
         <form action="" method="get" style="margin-bottom:2%;">
          <div class="row">
            <div class="input-icon col-md-4">
                <input type="email" class="form-control" placeholder="Search By Email" name="email"
                @if(request()->email)
                  value={{ request()->email }}
                @endif>
                <span>
                    <i class="flaticon2-search-1 text-muted"></i>

                </span>
            </div>

            <div class="input-icon col-md-4">
                <input type="text" class="form-control" placeholder="Search By first_name" name="first_name"
                @if(request()->first_name)
                  value={{ request()->user->first_name}}
                @endif>
                <span>
                    <i class="flaticon2-search-1 text-muted"></i>

                </span>
            </div>

            <div class="col-md-6">
                <button class="btn btn-danger btn-md" type="submit">Filter</button>
                <a href=""></a>
              </div>
          </div>


        </form>


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
                    <td>{{ $admin->user->first_name }}</td>
                    <td>{{ $admin->user->last_name}}</td>
                    <td>{{ $admin->user->mobile}}</td>
                    <td>{{ $admin->email }}</td>
                    <td>{{ $admin->user->gender }}</td>
                    <td>{{ $admin->user->status}}</td>
                    <td>
                        <img class="img-circle img-bordered-sm" src="{{ asset('images/admin/'. $admin->user->image)  }}" width="50" alt="">
                    </td>

                    <td>
                        <div class="btn-group">
                          {{-- <a href="{{ route('admins.edit' , $admin->id) }}" type="button" class="btn btn-info">edit</a> --}}
                          <a href="#" onclick="confirmDelete({{ $admin->id}},this)" type="button" class="btn btn-danger">Delete</a>
                          <a href="{{ route('admins.show' , $admin->id) }}" type="button" class="btn btn-success">show</a>
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

