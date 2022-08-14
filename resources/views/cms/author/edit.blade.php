@extends('cms.parent');

@section('tittle' , 'edit new author')

@section('main-tittle' , 'edit author')
@section('sub-tittle' , 'edit')

@section('styles')

@endsection



@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">edit author </h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
      <div class="card-body">
           <div class="row">
            <div class="form-group col-md-4">
                <label for="first_name">First_name</label>
                <input type="text" class="form-control" id="first_name" value="{{ $authors->user->first_name }}" name="first_name" placeholder="Enter first name">
              </div>
              <div class="form-group col-md-4">
                  <label for="last_name">Last_name</label>
                  <input type="text" class="form-control" id="last_name" value="{{ $authors->user->last_name }}" name="last_name" placeholder="Enter last name">
                </div>
                <div class="form-group col-md-4">
                  <label for="mobile ">Mobile</label>
                  <input type="text" class="form-control" id="mobile" value="{{ $authors->user->mobile }}" name="mobile" placeholder="Enter mobile number">
                </div>
           </div>
             <div class="row">
                <div class="form-group col-md-4">
                    <label for="date_of_birth">Date_of_Birth</label>
                    <input type="date" class="form-control" value="{{ $authors->user->date_of_birth }}" id="date_of_birth" name="date_of_birth" placeholder="">
                  </div> <div class="form-group col-md-4">
                    <label for="email">email</label>
                    <input type="email" class="form-control" id="email" value="{{ $authors->email }}" name="email" placeholder="Enter your email">
                  {{-- </div> <div class="form-group">
                    <label for="author_name col-md-4">password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                  </div> --}}
             </div>



          <div class="row">
            <div class="form-group col-md-4">
                <label for="gender">Gender</label>
                <select class="form-control select2" name="gender" id="gender"  style="width: 100%;">
                    <option selected >{{ $authors->user->gender }}</option>
                  <option value="male">male</option>
                  <option value="female">female</option>
                </select>
              </div>

              <div class="form-group col-md-4">
                  <label for="status">Status</label>
                  <select class="form-control select2" name="status" id="status"  style="width: 100%;">
                    <option selected >{{ $authors->user->status }}</option>
                    <option value="single">single</option>
                    <option value="married">married</option>
                  </select>
                </div>



            <div class="form-group col-md-4">
              <label for="">country</label>
              <select class="form-control select2" name="country_id" style="width: 100%;" id="country_id">
                     <option selected value="{{$authors->user->country->id}} " >{{$authors->user->country->country_name}} </option>
                     @foreach ($countries as $country )
                     <option value="{{ $country->id }}"> {{ $country->country_name }} </option>
                     @endforeach
              </select>
            </div>
          </div>

          <div class="form-group col-md-6">
            <label for="image">Image</label>
                <input type="file" class="form_control" id="image" name="image" placeholder="Enter image">
          </div>




      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button onclick="performUpdate({{ $authors->id }})" type="button" class="btn btn-primary">Update</button>
      </div>
    </form>
  </div>

@endsection

@section('scripts')

<script>


$('.country_id').select2({
    theme:'bootstrap4'
  })

  function performUpdate(id){
    let formData = new FormData;
   formData.append('first_name' ,document.getElementById('first_name').value );
   formData.append('last_name' ,document.getElementById('last_name').value );
   formData.append('mobile' ,document.getElementById('mobile').value );
   formData.append('date_of_birth' ,document.getElementById('date_of_birth').value );
   formData.append('email' ,document.getElementById('email').value );
   formData.append('gender' ,document.getElementById('gender').value );
   formData.append('country_id' ,document.getElementById('country_id').value );
   formData.append('status' ,document.getElementById('status').value );
   formData.append('image' ,document.getElementById('image').files[0]);


  storeRoute('/cms/admin/authors_update/'+id ,formData);


  }




</script>

@endsection





