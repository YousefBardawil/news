@extends('cms.parent');

@section('tittle' , 'edit new country')

@section('main-tittle' , 'edit country')
@section('sub-tittle' , 'edit')

@section('styles')

@endsection



@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit data of Country </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
      <div class="card-body">
        <div class="form-group">
          <label for="country_name">Country_name</label>
          <input type="text" class="form-control" id="country_name" name="country_name" value="{{ $countries->country_name }}" placeholder="">
        </div>
        <div class="form-group">
          <label for="code">code of the country</label>
          <input type="text" class="form-control" id="code" name="code" value="{{ $countries->code }}" placeholder="">
        </div>

      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button onclick="performUpdate({{ $countries->id }})" type="button" class="btn btn-primary">update</button>
      </div>
    </form>
  </div>

@endsection

@section('scripts')

<script>

  function performUpdate(id){
    let formData = new FormData;
   formData.append('country_name' ,document.getElementById('country_name').value );
   formData.append('code' ,document.getElementById('code').value );

   storeRoute('/cms/admin/countries_update/'+id ,formData);

  }

</script>
@endsection





