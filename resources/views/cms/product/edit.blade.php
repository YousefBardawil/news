@extends('cms.parent');

@section('tittle' , 'edit new product')

@section('main-tittle' , 'edit product')
@section('sub-tittle' , 'edit')

@section('styles')

@endsection



@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit data of product </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
      <div class="card-body">
        <div class="form-group">
          <label for="name">product_name</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ $products->name }}" placeholder="">
        </div>
        <div class="form-group col-md-6">
            <label for="image">Image</label>
                <input type="file" class="form_control" id="image" name="image" placeholder="Enter image">
          </div>

          <div class="form-group col-md-4">
            <label for="">invoice</label>
            <select class="form-control select2" name="invoice_id" style="width: 100%;" id="invoice_id">
                   <option selected value="{{$products->invoice->id}} " >{{$products->invoice->name}} </option>
                   @foreach ($invoices as $invoice )
                   <option value="{{ $invoice->id }}"> {{ $invoice->name }} </option>
                   @endforeach
            </select>
          </div>

      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button onclick="performUpdate({{ $products->id }})" type="button" class="btn btn-primary">update</button>
      </div>
    </form>
  </div>

@endsection

@section('scripts')

<script>

  function performUpdate(id){
    let formData = new FormData;
   formData.append('name' ,document.getElementById('name').value );
   formData.append('image' ,document.getElementById('image').files[0]);
   formData.append('invoice_id' ,document.getElementById('invoice_id').value );


   storeRoute('/cms/admin/products_update/'+id ,formData);

  }

</script>
@endsection





