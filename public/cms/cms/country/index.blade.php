@extends('cms.parent');

@section('tittle' , 'country')

@section('main-tittle' , 'index country')
@section('sub-tittle' , 'Data of country')

@section('styles')

@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <a href="{{ route('countries.create') }}" type="submit" class="btn btn-success">create new country</a>


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
                <th>country_name</th>
                <th>code</th>
                <th>created date</th>
                <th>setting</th>

              </tr>
            </thead>
            <tbody>

                @foreach ( $countries as $country )

                <tr>
                    <td>{{ $country->id }}</td>
                    <td>{{ $country->country_name }}</td>
                    <td>{{ $country->code }}</td>
                    <td>{{ $country->created_at }}</td>
                    <td>
                        <div class="btn-group">
                          <a href="{{ route('countries.edit' , $country->id) }}" type="button" class="btn btn-info">edit</a>
                          <a href="#" onclick="confirmDelete({{ $country->id}},this)" type="button" class="btn btn-danger">Delete</a>
                          <button type="button" class="btn btn-success">show</button>
                        </div>
                      </td>
                  </tr>

                @endforeach

            </tbody>
          </table>
        </div>

        {{ $countries->links() }}
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>


@endsection

@section('scripts')

<script>
    function confirmDelete(id , referance){
      let url = '/cms/admin/countries/'+id;
      confirmDestroy(url , referance);

    }
</script>

@endsection

