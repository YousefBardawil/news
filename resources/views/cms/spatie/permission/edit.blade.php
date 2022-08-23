@extends('cms.parent');

@section('tittle' , 'edit new permission')

@section('main-tittle' , 'edit permission')
@section('sub-tittle' , 'edit')

@section('styles')

@endsection



@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">edit permission </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
      <div class="card-body">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ $permissions->name }}" placeholder="Enter permission">
        </div>
        <div class="form-group col-md-4">
            <label for="guard_name">Gurad Name</label>
            <select class="form-control select2" name="guard_name" id="guard_name"  style="width: 100%;">
                <option >gurad name</option>
              <option value="admin" @if($permissions->guard_name == 'admin') selected @endif>Admin</option>
              <option value="author" @if($permissions->guard_name == 'author' )selected  @endif>Author</option>
              <option value="web" @if($permissions->guard_name == 'web' ) selected @endif>User</option>
            </select>
          </div>

      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <a href="{{ route('permissions.index') }}" type="submit" class="btn btn-success">Index page</a>
        <button onclick="performUpdate({{ $permissions->id }})" type="button" class="btn btn-primary">Update</button>
      </div>
    </form>
  </div>

@endsection

@section('scripts')

<script>
  function performUpdate(id){
    let formData = new FormData;
   formData.append('name' ,document.getElementById('name').value );
   formData.append('guard_name' ,document.getElementById('guard_name').value );

   storeRoute('/cms/admin/permissions_update/'+id,formData);


  }

</script>

@endsection





