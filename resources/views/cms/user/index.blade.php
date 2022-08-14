@extends('cms.parent');

@section('tittle' , 'user')

@section('main-tittle' , 'index user')
@section('sub-tittle' , 'Data of user')

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
                <th>first_name</th>
                <th>last_name</th>
                <th>user-type</th>
                <th>mobile</th>
                <th>email</th>
                <th>Gender</th>
                <th>status</th>
                {{-- <th>image</th> --}}


              </tr>
            </thead>
            <tbody>

                @foreach ( $users as $user )

                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name}}</td>
                    <td>{{ $user->actor_type }}</td>
                    <td>{{ $user->mobile}}</td>
                    <td>{{ $user->actor->email }}</td>
                    <td>{{ $user->gender }}</td>
                    <td>{{ $user->status}}</td>
                    {{-- <td>
                        <img class="img-circle img-bordered-sm" src="{{ asset('images/admin/' . $user->image)  }}" width="50" alt="">
                    </td> --}}


                  </tr>

                @endforeach

            </tbody>
          </table>
        </div>



        {{ $users->links() }}
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>


@endsection

@section('scripts')



@endsection

