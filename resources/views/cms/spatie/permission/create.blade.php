@extends('cms.parent');

@section('tittle' , 'create new permission')

@section('main-tittle' , 'create permission')
@section('sub-tittle' , 'create')

@section('styles')

@endsection



@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Create permission </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
      <div class="card-body">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Enter permission">
        </div>
        <div class="form-group col-md-4">
            <label for="guard_name">Gurad Name</label>
            <select class="form-control select2" name="guard_name" id="guard_name"  style="width: 100%;">
              <option value="admin">Admin</option>
              <option value="author">Author</option>
              <option value="web">User</option>
            </select>
          </div>

      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <a href="{{ route('permissions.index') }}" type="submit" class="btn btn-success">Index page</a>
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
   formData.append('guard_name' ,document.getElementById('guard_name').value );

   store('/cms/admin/permissions',formData);


  }

</script>

@endsection





