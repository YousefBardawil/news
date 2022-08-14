@extends('cms.parent');

@section('tittle' , 'create new country')

@section('main-tittle' , 'create country')
@section('sub-tittle' , 'create')

@section('styles')

@endsection



@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Create Country </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
      <div class="card-body">
        <div class="form-group">
          <label for="country_name">Country_name</label>
          <input type="text" class="form-control" id="country_name" name="country_name" placeholder="Enter country">
        </div>
        <div class="form-group">
          <label for="code">code number</label>
          <input type="text" class="form-control" id="code" name="code" placeholder="Enter country code">
        </div>

      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <a href="{{ route('countries.index') }}" type="submit" class="btn btn-success">Index page</a>
        <button onclick="performStore()" type="button" class="btn btn-primary">Store</button>
      </div>
    </form>
  </div>

@endsection

@section('scripts')

<script>
  function performStore(){
    let formData = new FormData;
   formData.append('country_name' ,document.getElementById('country_name').value );
   formData.append('code' ,document.getElementById('code').value );

   store('/cms/admin/countries',formData);


  }

</script>

@endsection





