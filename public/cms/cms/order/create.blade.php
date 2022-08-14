@extends('cms.parent');

@section('tittle' , 'create new order')

@section('main-tittle' , 'create order')
@section('sub-tittle' , 'create')

@section('styles')

@endsection



@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Create order </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
      <div class="card-body">
        <div class="form-group">
          <label for="order_name">order_name</label>
          <input type="text" class="form-control" id="order_name" name="order_name" placeholder="Enter order">
        </div>
        <div class="form-group">
          <label for="price">price</label>
          <input type="number" class="form-control" id="price" name="price" placeholder="Enter price">
        </div>

        <div class="form-group col-md-4">
            <label for="img">img</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="img" name="img">
                <label class="custom-file-label" for="img"  >Choose file</label>
              </div>

      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <a href="{{ route('orders.index') }}" type="submit" class="btn btn-success">Index page</a>
        <button onclick="performStore()" type="button" class="btn btn-primary">Store</button>
      </div>
    </form>
  </div>

@endsection

@section('scripts')

<script>
  function performStore(){
    let formData = new FormData;
   formData.append('order_name' ,document.getElementById('order_name').value );
   formData.append('code' ,document.getElementById('code').value );

   store('/cms/admin/countries',formData);


  }

</script>

@endsection





