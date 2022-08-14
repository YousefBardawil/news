@extends('cms.parent');

@section('tittle' , 'edit new invoice')

@section('main-tittle' , 'edit invoice')
@section('sub-tittle' , 'edit')

@section('styles')

@endsection



@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit data of invoice </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
      <div class="card-body">
        <div class="form-group">
          <label for="name">invoice_name</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ $invoices->name }}" placeholder="">
        </div>
        <div class="form-group">
            <label for="quantity">quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $invoices->quantity }}" placeholder="Enter quantity">
          </div>
          <div class="form-group">
            <label for="price">price</label>
            <input type="number" class="form-control" id="price" value="{{ $invoices->price }}" name="price" placeholder="Enter price">
          </div>
          <div class="form-group">
            <label for="total">total</label>
            <input type="total" class="form-control" id="total" value="{{ $invoices->total }}" name="total" placeholder="Enter total">
          </div>


      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button onclick="performUpdate({{ $invoices->id }})" type="button" class="btn btn-primary">update</button>
      </div>
    </form>
  </div>

@endsection

@section('scripts')

<script>

  function performUpdate(id){
    let formData = new FormData;
   formData.append('name' ,document.getElementById('name').value );
   formData.append('quantity' ,document.getElementById('quantity').value );
   formData.append('price' ,document.getElementById('price').value );
   formData.append('total' ,document.getElementById('total').value );


   storeRoute('/cms/admin/invoices_update/'+id ,formData);

  }

</script>
@endsection





