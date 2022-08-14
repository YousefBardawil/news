@extends('cms.parent');

@section('tittle' , 'create new city')

@section('main-tittle' , 'create city')
@section('sub-tittle' , 'create')

@section('styles')

@endsection



@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Create City </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('cities.store') }}" method="POST">
        @csrf

        @if ($errors->any())


        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i> Alert!</h5>
            @foreach ($errors->all() as $error )
            <li>{{ $error }}</li>
            @endforeach
          </div>

        @endif

        @if(session()->has('message'))

        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> created </h5>
           {{ session('message') }}
          </div>
        @endif





      <div class="card-body">
        <div class="form-group">
          <label for="city_name">City_name</label>
          <input type="text" class="form-control" id="city_name" name="city_name" placeholder="Enter city">
        </div>
        <div class="form-group">
          <label for="street_name">street_name</label>
          <input type="text" class="form-control" id="street_name" name="street_name" placeholder="Enter street">
        </div>

        <div class="form-group">
            <label for="">country</label>
            <select class="form-control select2" name="country_id" style="width: 100%;" id="country_id">

                   @foreach ($countries as $country )
                   <option value="{{ $country->id }}"> {{ $country->country_name }} </option>
                   @endforeach
            </select>
          </div>

      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <a href="{{ route('cities.index') }}" type="submit" class="btn btn-success">Index page</a>
        <button type="submit" class="btn btn-primary">Store</button>
      </div>
    </form>
  </div>

@endsection

@section('scripts')

<script>
  $('.country_id').select2({
    theme:'bootstrap4'
  })
</script>

@endsection





