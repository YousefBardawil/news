@extends('cms.parent');

@section('tittle' , 'city')

@section('main-tittle' , 'index city')
@section('sub-tittle' , 'Data of city')

@section('styles')

@endsection

@section('content')

   @if(session()->has('message'))

        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> delete </h5>
           {{ session('message') }}
          </div>
        @endif

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <a href="{{ route('cities.create') }}" type="submit" class="btn btn-success">create new city</a>


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
                <th>country</th>
                <th>city_name</th>
                <th>street_name</th>
                <th>created date</th>
                <th>setting</th>

              </tr>
            </thead>
            <tbody>

                @foreach ( $cities as $city )

                <tr>
                    <td>{{ $city->id }}</td>
                    <td>{{ $city->country->country_name}}</td>
                    <td>{{ $city->city_name }}</td>
                    <td>{{ $city->street_name }}</td>
                    <td>{{ $city->created_at }}</td>
                    <td>

                         <form action="{{ route('cities.destroy' , $city->id) }}" method="POST"  >
                          <a href="{{ route('cities.edit' , $city->id) }}" type="button" class="btn btn-info">edit</a>
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">delete</button>

                          <button type="button" class="btn btn-success">show</button>
                        </form>


                      </td>
                  </tr>

                @endforeach

            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>


@endsection

@section('scripts')


@endsection

