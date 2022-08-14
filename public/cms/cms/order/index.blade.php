@extends('cms.parent');

@section('tittle' , 'order')

@section('main-tittle' , 'index order')
@section('sub-tittle' , 'Data of order')

@section('styles')

@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <a href="{{ route('orders.create') }}" type="submit" class="btn btn-success">create new order</a>


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
                <th>order_name</th>
                <th>price</th>
                <th>img</th>
                <th>setting</th>

              </tr>
            </thead>
            <tbody>

                @foreach ( $orders as $order )

                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->order_name }}</td>
                    <td>{{ $order->price }}</td>
                    <td>{{ $order->img }}</td>
                    <td>
                        <div class="btn-group">
                          <a href="{{ route('orders.edit' , $order->id) }}" type="button" class="btn btn-info">edit</a>
                          <a href="#" onclick="confirmDelete({{ $order->id}},this)" type="button" class="btn btn-danger">Delete</a>
                          <button type="button" class="btn btn-success">show</button>
                        </div>
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

<script>
    function confirmDelete(id , referance){
      let url = '/cms/admin/countries/'+id;
      confirmDestroy(url , referance);

    }
</script>

@endsection

