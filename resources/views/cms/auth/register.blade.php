<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('cms/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('cms/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('cms/dist/css/adminlte.min.css') }}">

  <link rel="stylesheet" href="{{ asset('cms/plugins/toastr/toastr.min.css') }}">
  <link rel="stylesheet"   href="https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css"  >
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
</head>

<body>

    <div class="">

        <div class="register-logo">
            <a href="../../index2.html">News System</a>
          </div>


        <!-- /.card-header -->
        <!-- form start -->
        <form class="">
            <div class="card-header">
                <h3 class="card-title">Create an account </h3>
              </div>
          <div class="card-body">
               <div class="row">
                <div class="form-group col-md-4">
                    <label for="first_name">First_name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter first name">
                  </div>
                  <div class="form-group col-md-4">
                      <label for="last_name">Last_name</label>
                      <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter last name">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="mobile ">Mobile</label>
                      <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter mobile number">
                    </div>
               </div>
                 <div class="row">
                    <div class="form-group col-md-4">
                        <label for="date_of_birth">Date_of_Birth</label>
                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" placeholder="">
                      </div>
                       <div class="form-group col-md-4">
                        <label for="email">email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                      </div> <div class="form-group">
                        <label for="admin_name col-md-4">password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                      </div>
                 </div>



              <div class="row">
                <div class="form-group col-md-4">
                    <label for="gender">Gender</label>
                    <select class="form-control select2" name="gender" id="gender"  style="width: 100%;">
                      <option value="male">male</option>
                      <option value="female">female</option>
                    </select>
                  </div>

                  <div class="form-group col-md-4">
                      <label for="status">Status</label>
                      <select class="form-control select2" name="status" id="status"  style="width: 100%;">
                        <option value="single">single</option>
                        <option value="married">married</option>
                      </select>
                    </div>



                <div class="form-group col-md-4">
                  <label for="">country</label>
                  <select class="form-control select2" name="country_id" style="width: 100%;" id="country_id">

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
            {{-- <a href="{{ route('admins.index') }}" type="submit" class="btn btn-success"></a> --}}
            <button onclick="register()" type="button" class="btn btn-primary">Register</button>
          </div>
        </form>
      </div>

      <script src="{{ asset('cms/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('cms/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('cms/dist/js/adminlte.min.js') }}"></script>

<script src="{{ asset('cms/plugins/toastr/toastr.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{ asset('cms/js/crud.js') }}"></script>


    <script>

    $('.country_id').select2({
        theme:'bootstrap4'
      })

      function register(){
        let formData = new FormData;
       formData.append('first_name' ,document.getElementById('first_name').value );
       formData.append('last_name' ,document.getElementById('last_name').value );
       formData.append('mobile' ,document.getElementById('mobile').value );
       formData.append('date_of_birth' ,document.getElementById('date_of_birth').value );
       formData.append('email' ,document.getElementById('email').value );
       formData.append('password' ,document.getElementById('password').value );
       formData.append('gender' ,document.getElementById('gender').value );
       formData.append('country_id' ,document.getElementById('country_id').value );
       formData.append('status' ,document.getElementById('status').value );
       formData.append('image' ,document.getElementById('image').files[0]);

       store('/cms/do-register',formData);

      }


    </script>




</body>




</html>
