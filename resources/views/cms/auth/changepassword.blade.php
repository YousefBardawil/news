@extends('cms.parent');

@section('tittle' , 'change password')

@section('main-tittle' , 'change password')
@section('sub-tittle' , 'change ')

@section('styles')

@endsection



@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">change password </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
      <div class="card-body">
        <div class="form-group">
          <label for="password">current password</label>
          <input type="password" class="form-control" id="password"  placeholder="Enter current password">
        </div>

        <div class="form-group">
          <label for="new_password">new password</label>
          <input type="password" class="form-control" id="new_password"  placeholder="Enter new password">
        </div>
        <div class="form-group">
            <label for="new_password_confirmation">re-type new password</label>
            <input type="password" class="form-control" id="new_password_confirmation"  placeholder="Retype new password">
          </div>

      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button onclick="performStore()" type="button" class="btn btn-primary">change password</button>
      </div>
    </form>
  </div>

@endsection

@section('scripts')

<script>
  function performStore(){
    let formData = new FormData;
   formData.append('password' ,document.getElementById('password').value );
   formData.append('new_password' ,document.getElementById('new_password').value );
   formData.append('new_password_confirmation' ,document.getElementById('new_password_confirmation').value );


   store('/cms/admin/update/password',formData);


  }

</script>

@endsection





