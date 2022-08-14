@extends('cms.parent');

@section('tittle' , 'create new product')

@section('main-tittle' , 'create product')
@section('sub-tittle' , 'create')

@section('styles')

@endsection



@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Create product </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
      <div class="card-body">
        <div class="form-group">
          <label for="name">product_name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Enter product name">
        </div>

        <div class="form-group col-md-6">
            <label for="image">Image</label>
                <input type="file" class="form_control" id="image" name="image" placeholder="Enter image">

          </div>

          <div class="form-group">
            <label for="">Invoice</label>
            <select class="form-control select2" name="invoice_id" style="width: 100%;" id="invoice_id">

                   @foreach ($invoices as $invoice )
                   <option value="{{ $invoice->id }}"> {{ $invoice->name }} </option>
                   @endforeach
            </select>
          </div>

      </div>

      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <a href="{{ route('products.index') }}" type="submit" class="btn btn-success">Index page</a>
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
   formData.append('image' ,document.getElementById('image').files[0] );
   formData.append('invoice_id' ,document.getElementById('invoice_id').value );


   store('/cms/admin/products',formData);


  }

</script>

@endsection





