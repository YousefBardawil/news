@extends('cms.parent');

@section('tittle' , 'create new invoice')

@section('main-tittle' , 'create invoice')
@section('sub-tittle' , 'create')

@section('styles')

@endsection



@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Create invoice </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
      <div class="card-body">
        <div class="form-group">
          <label for="name">invoice_name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Enter invoice name">
        </div>
        <div class="form-group">
            <label for="quantity">quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter quantity">
          </div>
          <div class="form-group">
            <label for="price">price</label>
            <input type="number" class="form-control" id="price" name="price" placeholder="Enter price">
          </div>
          <div class="form-group">
            <label for="total">total</label>
            <input type="number" class="form-control" id="total" name="total" placeholder="Enter total">
          </div>



      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <a href="{{ route('invoices.index') }}" type="submit" class="btn btn-success">Index page</a>
        <button onclick="performStore()" type="button" class="btn btn-primary">Store</button>
      </div>
    </form>
  </div>

@endsection

@section('scripts')

<script>
  function performStore(){
    let formData = new FormData;
   formData.append('name' ,document.getElementById('name').value );
   formData.append('quantity' ,document.getElementById('quantity').value );
   formData.append('price' ,document.getElementById('price').value );
   formData.append('total' ,document.getElementById('total').value );


   store('/cms/admin/invoices',formData);


  }

</script>

@endsection





