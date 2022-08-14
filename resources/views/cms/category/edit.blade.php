@extends('cms.parent');

@section('tittle' , 'edit new category')

@section('main-tittle' , 'edit category')
@section('sub-tittle' , 'edit')

@section('styles')

@endsection



@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit data of category </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
      <div class="card-body">
        <div class="form-group">
          <label for="name"> category-name</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ $categories->name }}" placeholder="">
        </div>

        <div class="form-group">
        <div><label for="description">description of the category</label> </div>
          <textarea name="description" id="description"  rows="5" cols="40"> {{ $categories->description }} </textarea>
          </div>

      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button onclick="performUpdate({{ $categories->id }})" type="button" class="btn btn-primary">update</button>
      </div>
    </form>
  </div>

@endsection

@section('scripts')

<script>

  function performUpdate(id){
    let formData = new FormData;
   formData.append('name' ,document.getElementById('name').value );
   formData.append('description' ,document.getElementById('description').value );

   storeRoute('/cms/admin/categories_update/'+id ,formData);

  }

</script>
@endsection





