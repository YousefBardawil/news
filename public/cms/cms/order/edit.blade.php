@extends('cms.parent');

@section('tittle' , 'edit new order')

@section('main-tittle' , 'edit order')
@section('sub-tittle' , 'edit')

@section('styles')

@endsection



@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit data of order </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
      <div class="card-body">
        <div class="form-group">
          <label for="order_name">order_name</label>
          <input type="text" class="form-control" id="order_name" name="order_name" value="{{ $orders->order_name }}" placeholder="">
        </div>
        <div class="form-group">
          <label for="price">code of the order</label>
          <input type="text" class="form-control" id="price" name="price" value="{{ $orders->price }}" placeholder="">
        </div>

      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button onclick="performUpdate({{ $orders->id }})" type="button" class="btn btn-primary">update</button>
      </div>
    </form>
  </div>

@endsection

@section('scripts')

<script>

  function performUpdate(id){
    let formData = new FormData;
   formData.append('order_name' ,document.getElementById('order_name').value );
   formData.append('code' ,document.getElementById('code').value );

   storeRoute('/cms/admin/countries_update/'+id ,formData);

  }

</script>
@endsection





