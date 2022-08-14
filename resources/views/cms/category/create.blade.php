@extends('cms.parent');

@section('tittle' , 'create new category')

@section('main-tittle' , 'create category')
@section('sub-tittle' , 'create')

@section('styles')

@endsection



@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Create category </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
      <div class="card-body">
        <div class="form-group col-md-12">
          <label for="name">Category-name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Enter category">
        </div>
        <div class="form-group col-md-12">
        <div><label for="description">description </label></div>
          <textarea name="description" style="resize: none;" id="description"  rows="5" cols="40"></textarea>
        </div>

      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <a href="{{ route('categories.index') }}" type="submit" class="btn btn-success">Index page</a>
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
   formData.append('description' ,document.getElementById('description').value );

   store('/cms/admin/categories',formData);


  }

</script>

@endsection





