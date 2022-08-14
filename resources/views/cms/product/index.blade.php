@extends('cms.parent');

@section('tittle' , 'product')

@section('main-tittle' , 'index product')
@section('sub-tittle' , 'Data of product')

@section('styles')

@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <a href="{{ route('products.create') }}" type="submit" class="btn btn-success">create new product</a>


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
                <th>product_name</th>
                <th>image</th>
                <th>invoice_name</th>
                <th>setting</th>

              </tr>
            </thead>
            <tbody>

                @foreach ( $products as $product )

                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>
                        <img class="img-circle img-bordered-sm" src="{{ asset('images/product/'. $product->image)  }}" width="50" alt="">
                    </td>

                    <td>{{ $product->invoice->name }}</td>



                    <td>
                        <div class="btn-group">
                          <a href="{{ route('products.edit' , $product->id) }}" type="button" class="btn btn-info">edit</a>
                          <a href="#" onclick="confirmDelete({{ $product->id}},this)" type="button" class="btn btn-danger">Delete</a>
                          <button type="button" class="btn btn-success">show</button>
                        </div>
                      </td>
                  </tr>

                @endforeach

            </tbody>
          </table>
        </div>

        {{ $products->links() }}
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>


@endsection

@section('scripts')

<script>
    function confirmDelete(id , referance){
      let url = '/cms/admin/products/'+id;
      confirmDestroy(url , referance);

    }
</script>

@endsection

