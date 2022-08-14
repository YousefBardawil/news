@extends('cms.parent');

@section('tittle' , 'profile')

@section('main-tittle' , 'index profile')
@section('sub-tittle' , 'Data of profile')

@section('styles')

@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            {{-- <a href="{{ route('profiles.create') }}" type="submit" class="btn btn-success">create new profile</a> --}}


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
                <th>email</th>
                <th>Gender</th>
                <th>status</th>
                <th>image</th>
                <th>settings</th>

              </tr>
            </thead>
            <tbody>

                @foreach ( $profiles as $profile )

                <tr>
                    <td>{{ $profile->id }}</td>
                    <td>{{ $profile->admin->user->first_name}}</td>
                    {{-- <td>{{ $profile->user->last_name}}</td>
                    <td>{{ $profile->email }}</td>
                    <td>{{ $profile->user->gender }}</td>
                    <td>{{ $profile->user->status}}</td> --}}
                    <td>
                        <img class="img-circle img-bordered-sm" src="{{ asset('images/profile/'. $profile->user->image)  }}" width="50" alt="">
                    </td>

                    <td>
                        <div class="btn-group">
                          <a href="{{ route('profiles.edit' , $profile->id) }}" type="button" class="btn btn-info">edit</a>
                          <a href="#" onclick="confirmDelete({{ $profile->id}},this)" type="button" class="btn btn-danger">Delete</a>
                          <button type="button" class="btn btn-success">show</button>
                        </div>
                      </td>
                  </tr>

                @endforeach

            </tbody>
          </table>
        </div>



        {{ $profiles->links() }}
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>


@endsection

@section('scripts')

<script>
    function confirmDelete(id , referance){
      let url = '/cms/admin/profiles/'+id;
      confirmDestroy(url , referance);

    }
</script>

@endsection

