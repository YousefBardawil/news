@extends('cms.parent');

@section('tittle' , 'invoice')

@section('main-tittle' , 'index invoice')
@section('sub-tittle' , 'Data of invoice')

@section('styles')

@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
            <a href="{{ route('invoices.create') }}" type="submit" class="btn btn-success">create new invoice</a>


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
                <th>invoice_name</th>
                <th>quantity</th>
                <th>price</th>
                <th>total</th>
                <td>number od products</td>
                <th>setting</th>

              </tr>
            </thead>
            <tbody>

                @foreach ( $invoices as $invoice )

                <tr>
                    <td>{{ $invoice->id }}</td>
                    <td>{{ $invoice->name }}</td>
                    <td>{{ $invoice->quantity }}</td>
                    <td>{{ $invoice->price }}</td>
                    <td>{{ $invoice->total }}</td>
                    <td class="d-flex justify-content-center "><span class="bg-secondary px-2 rounded-pill">{{ $invoice->products_count }}</span></td>

                    <td>
                        <div class="btn-group">
                          <a href="{{ route('invoices.edit' , $invoice->id) }}" type="button" class="btn btn-info">edit</a>
                          <a href="#" onclick="confirmDelete({{ $invoice->id}},this)" type="button" class="btn btn-danger">Delete</a>
                          <button type="button" class="btn btn-success">show</button>
                        </div>
                      </td>
                  </tr>

                @endforeach

            </tbody>
          </table>
        </div>

        {{ $invoices->links() }}
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>


@endsection

@section('scripts')

<script>
    function confirmDelete(id , referance){
      let url = '/cms/admin/invoices/'+id;
      confirmDestroy(url , referance);

    }
</script>

@endsection

